@extends('layouts.user')
@section('title')
    My Task
@endsection
@section('user')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">My Tasks</h4>
                <div class="page-title-right">
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tasks List</h4>
                <div class="table-responsive">
                    <table class="table mb-0" id="alldeposit">
                        <thead class="table-light job-list-header bg-fountain-blue">
                        <tr>
                            <th>Job Title</th>
                            <th>Task ID</th>
                            <th>Submitted Date</th>
                            <th>Status</th>
                            <th>Action</th>
                            <th>Report By Freelancer</th>
                        </tr>
                        </thead>
                        <tbody class="job-list-item">
                        @foreach($my_tasks as $task)
                            <?php
                            $job_title = \App\Models\all_job::select('id', 'job_title')->where('id', $task->job_id)->first();
                            ?>
                            <tr>
                                <td>
                                    @if($job_title)
                                        {{$job_title->job_title}}
                                    @endif
                                </td>
                                <td>{{$task->task_name}}</td>
                                <td>{{\Carbon\Carbon::parse($task->created_at)->format('Y-m-d')}}</td>
                                <td>
                                    @if ($task->status == 0)
                                        <span class="badge badge-soft-success p-2">Applied</span>
                                    @elseif($task->status == 1)
                                        <span class="badge badge-soft-success p-2">Submitted</span>
                                    @elseif($task->status == 2)
                                        <span class="badge badge-soft-success p-2">Approved</span>
                                    @elseif($task->status == 3)
                                        <span class="badge badge-soft-success p-2">Rejected</span>
                                    @else
                                        <span class="badge badge-soft-success p-2">Not Set</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('user.find.job.details',$task->job_id)}}">
                                        <button class="btn btn-success btn-sm">View More</button>
                                    </a>
                                </td>

                                <td></td>
                                <td></td>
                                <td></td>
                              
                                <td>
                                    <button type="button" class="btn btn-primary d-block w-100" data-bs-toggle="modal"
                                            data-bs-target="#report{{$task->id}}">
                                        Report Now
                                    </button>

                            

                                <div class="modal fade" id="report{{$task->id}}" data-bs-backdrop="static"
                                     data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                     aria-hidden="true">
                                    <form action="{{route('user.report.freelancer')}}" method="post">
                                        @csrf
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Report</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                                   <select name="report_type"  class="form-control" >
                                                        <option value="Spammer">Spammer</option>
                                                        <option value="Wrong job submit">Wrong job submit</option>
                                                        <option value="Incomplete Task">Incomplete Task</option>
                                                        <option value="Time Duration">Time Duration</option>
                                                        <option value="Others Report">Others Report</option>
                                                    </select>
                                                    
                                                        <label>Summery</label>
                                                        <textarea class="form-control" cols="5" rows="5"
                                                                  name="report_summery" required></textarea>

                                                        <input type="hidden" value="{{$task->id}}"
                                                               name="id">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
</div>               
                        <!-- end card -->
                                </td>
                            


                            </tr>

                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>

        </div>
        {{$my_tasks->links()}}
    </div>

@endsection

@section('js')
    <script>


    </script>
@endsection
