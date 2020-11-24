<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Jobs\SendEmail;

class SendMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:statistical';

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
    public function __construct(UserRepositoryInterface $userRepo, OrderRepositoryInterface $orderRepo)
    {   
        parent::__construct();
        $this->userRepo = $userRepo;
        $this->orderRepo = $orderRepo;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = $this->userRepo->getAll(); 
        $orders = $this->orderRepo->getAllOrderByWeek();

        SendEmail::dispatch($orders, $users);
    }
}
