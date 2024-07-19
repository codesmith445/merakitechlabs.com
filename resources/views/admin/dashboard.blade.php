@extends('admin-layouts.admin-layout')
<title>@yield('title', 'Dashboard')</title>
@section('content')
    <div class="az-content az-content-dashboard">
        <div class="container">
            <div class="az-content-body">
                <div class="az-dashboard-one-title">
                    <div>
                        <h2 class="az-dashboard-title">Welcome to the Dashboard!</h2>
                        <p class="az-dashboard-text">You are logged in as {{ Auth::guard('admin')->user()->email }}</p>
                    </div>
                    <div class="az-content-header-right">
                        <div class="media">
                            <div class="media-body">
                                <label>Start Date</label>
                                <h6>Oct 10, 2018</h6>
                            </div><!-- media-body -->
                        </div><!-- media -->
                        <div class="media">
                            <div class="media-body">
                                <label>End Date</label>
                                <h6>Oct 23, 2018</h6>
                            </div><!-- media-body -->
                        </div><!-- media -->
                        <div class="media">
                            <div class="media-body">
                                <label>Event Category</label>
                                <h6>All Categories</h6>
                            </div><!-- media-body -->
                        </div><!-- media -->
                        <a href="" class="btn btn-default" style="background-color: #ffc107;" onmouseover="this.style.backgroundColor='#d9a600'" onmouseout="this.style.backgroundColor='#ffc107'" data-toggle="modal" data-target="#createPostModal">Create New Post</a>
                    </div>
                </div><!-- az-dashboard-one-title -->
                <div>
                @include('admin-layouts.admin-nav')

                </div>
                @livewire('show-posts')
                    </div>
                
            </div><!-- az-content-body -->
        </div>
        <!-- Modal -->
 <div class="modal fade" id="createPostModal" tabindex="-1" role="dialog" aria-labelledby="createPostModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createPostModalLabel">Create Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form fields for the modal -->
                    @livewire('post-form')
                    
                    <!-- @livewire('step-form') -->
                </div>
            </div>
        </div>
    </div>
    </div><!-- az-content -->
 
   
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- <script>
    document.getElementById('add-step').addEventListener('click', function() {
    // Get the number of existing steps
    var stepCount = document.querySelectorAll('.step').length + 1;

    // Create HTML elements for a new step
    var newStep = document.createElement('div');
    newStep.classList.add('step');
    newStep.innerHTML = `
        <h4>Step ${stepCount}</h4>
        <input type="hidden" name="steps[${stepCount}][step_number]" value="${stepCount}">
        <div class="form-group">
            <label for="step_image_${stepCount}">Step Image</label>
            <input type="file" name="steps[${stepCount}][image]" id="step_image_${stepCount}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="step_instructions_${stepCount}">Instructions</label>
            <textarea class="form-control" name="steps[${stepCount}][instructions]" id="step_instructions_${stepCount}" cols="5" rows="5" placeholder="Instructions for step ${stepCount}"></textarea>
        </div>
        <div class="form-group">
            <label for="step_source_code_${stepCount}">Source Code</label>
            <textarea class="form-control" name="steps[${stepCount}][source_code]" id="step_source_code_${stepCount}" cols="5" rows="5" placeholder="Source Code for step ${stepCount}"></textarea>
        </div>
        `;

        // Append the new step to the steps section
        document.getElementById('steps-section').appendChild(newStep);
    });
</script> -->
@endsection
