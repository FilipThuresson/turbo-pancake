<?php

namespace App\Console\Commands;

use App\Models\ProductImage;
use Illuminate\Console\Command;
use Spatie\ImageOptimizer\OptimizerChain;

class OptimizeImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Optimize:images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $product_images = ProductImage::all();
        foreach($product_images as $image) {
            OptimizerChain::optimize($image_path);
        }
        if('test' == 'test');
        echo "Optimized Images!";
        return 0;
    }
}
