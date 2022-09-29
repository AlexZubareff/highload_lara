<?php

namespace App\Http\Controllers;

use App\services\QuickSortInterface;
use Illuminate\Routing\Controller as BaseController;
use Psr\log\LoggerInterface;
use Throwable;

class MathController extends BaseController
{
    public function __construct(
        private LoggerInterface $logger,
        private QuickSortInterface $quickSort
    ){

    }
    public function list()
    {
        try{
            $inputArray = [1, 6, 5, 8, 6, 2, 4, 3, 8, 78, 12, 45, 65, 14, 98, 25, 35];
            $timeStart = time();

            $sortedArray = $this->quickSort->sort($inputArray);



            $timeEnd = time();
            $memoryUsage = memory_get_usage();

            $this->logger->debug($timeEnd-$timeStart);
            $this->logger->debug($memoryUsage);
        } catch (Throwable $exception)
        {
            $this->logger->error('Здесь была ошибка'. $exception->getMessage());
        }
    }
}
