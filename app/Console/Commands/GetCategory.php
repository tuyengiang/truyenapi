<?php

namespace App\Console\Commands;

use App\Entities\Category;
use App\Repositories\CategoryRepositoryEloquent;
use Goutte\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use MongoDB\Driver\Session;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class GetCategory extends Command
{
    use DatabaseMigrations;
    protected $category;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'category:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawl Category Store';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CategoryRepositoryEloquent $categoryRepositoryEloquent)
    {
        parent::__construct();
        $this->category = $categoryRepositoryEloquent;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $client = new Client();
        $url = "https://truyenfull.vn/";
        $crawler = $client->request('GET', $url);
        $crawler->filter('#list-index .col-truyen-side .list-cat .col-xs-6 a')->each(function ($node) use ($client) {
            $crawlCategory = $client->request('GET', $node->attr('href'));
            $content = ($crawlCategory->filter('#list-page .col-truyen-side .cat-desc .panel-body')->count() > 0) ? $crawlCategory->filter('#list-page .col-truyen-side .cat-desc .panel-body')->html() : '';
            $session = DB::getMongoClient()->startSession();
            $session->startTransaction();
            try {
                $category = Category::where('title', $node->text())->select('_id')->first();
                $data = [
                    'title' => $node->text(),
                    'link' => $node->attr('href'),
                    'slug' => Str::slug($node->text()),
                    'overview' => $content
                ];
                if (!empty($category)) {
                    $this->category->update($data, $category->id);
                    print'+ Cập nhật thể loại ' . $node->text() . ' thành công !!! ' . "\n";
                } else {
                    $this->category->create($data);
                    print'+ Thêm thể loại ' . $node->text() . ' thành công !!!' . "\n";
                }
                $session->commitTransaction();
                sleep(3);
            } catch (\Exception $e) {
                $session->abortTransaction();
                print('loi: ' . $e->getMessage()) . PHP_EOL . "\n";
            }
        });
    }
}
