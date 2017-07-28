<?php

namespace App\Console\Commands;

use App\Models\Task;
use Illuminate\Console\Command;

class Status extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'status {action}';

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
     *
     */
    public function handle()
    {
        switch ($this->argument('action')) {
            case 'first':
                $tasks = Task::where("status","new")->get();
                foreach ($tasks as $task) {
                    $request = $this->getRequest("http://node:8000/api/first/{$task->name}");
                    if ($task->value == $request->value) {
                        Task::where('name',$task->name)
                            ->update(['status' => 'processing']);
                    }
                }
                break;
            case 'second':
                $tasks = Task::where('status','processing')->get();
                foreach ($tasks as $task) {
                    $request = $this->getRequest("http://node:8000/api/second/{$task->name}");
                    if ($request->processed == 'true') {
                        Task::where('id',$request->id)
                            ->update(['status' => 'done']);
                    }
                }
                break;
        }
    }

    /**
     * @param $url
     * @return mixed
     */
    public function getRequest($url) {
        $request = curl_init();
        curl_setopt($request,CURLOPT_URL,$url);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
        return json_decode(curl_exec($request));
    }
}
