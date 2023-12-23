    <div class="header">

        <a href="/" class="logo">Event Scheduler</a>
        <div class="header-right">
            @guest <!-- Check if the user is a guest (not logged in) -->
                <a class="active" href="{{ __('register') }}">SignUp</a>
                <a href="{{ route('login') }}">LogIn</a>
            @else <!-- User is logged in -->
                <a href="{{ route('profile.show') }}">{{ Auth::user()->name }}</a>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                <form id="logout-form"  method="POST" action="{{ route('logout') }}">
                    @csrf
                    
                </form>
            @endguest
        </div>
    </div>

        
    <!-- Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-body">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title">
                        <span id="titleError" class="text-danger"></span>

                        <label for="start">Start Time:</label>
                        <input type="time" class="form-control" id="start" autocomplete="off">
                        <span id="startError" class="text-danger"></span>

                        <label for="end">End Time:</label>
                        <input type="time" class="form-control" id="end" autocomplete="off" >
                        <span id="endError" class="text-danger"></span>

                        <label for="color">Color:</label>
                        <select class="form-control" id="color" style="background-color: rgba(0, 0, 0, 0.3);">
                            <option value="red">Red</option>
                            <option value="blue">Blue</option>
                            <option value="green">Green</option>
                            <option value="yellow">Yellow</option>
                            <option value="purple">Purple</option>
                        </select>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveBtn">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <br><br><br>

    <div class="container">
        
        <div id="calendar"></div>

    </div>