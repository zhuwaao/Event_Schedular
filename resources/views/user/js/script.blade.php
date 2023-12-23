<script>
    $(document).ready(function() {
        // Check if the user is logged in
        var isLoggedIn = @json(Auth::check());

        // Disable editing and adding events if not logged in
        var editable = isLoggedIn;
        var selectable = isLoggedIn;
        var selectHelper = isLoggedIn;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var booking = @json($events);
        var start, end; // Declare start and end variables



        //save button
        $('#saveBtn').click(function() {
            if(!isLoggedIn) return;
            var title = $("#title").val();
            var start_time = $("#start").val();
            var end_time = $("#end").val();
            var color = $("#color").val();
            var start_date = moment(start).format('YYYY-MM-DD') + 'T' + start_time;
            var end_date = moment(start).format('YYYY-MM-DD') + 'T' + end_time; 

            $.ajax({
                url: "{{ route('calendar.store') }}",
                type: "POST",
                dataType: 'json',
                data: { title, start_date, end_date, color },
                success: function (response) {
                    $('#bookingModal').modal('hide');
                    $('#calendar').fullCalendar('renderEvent', {
                        'title': response.title,
                        'start': response.start,
                        'end': response.end,
                        'color': response.color,
                        'textColor': 'steelblue',
                        'borderColor': 'red',
                    }, true);
                    $('#calendar').fullCalendar('unselect');

                    swal("Great!", "Event added!", "success");
                },
                error: function(error) {
                    if (error.responseJSON.errors) {
                        $('#titleError').html(error.responseJSON.errors.title);
                    }
                },
            });
        });






        $('#calendar').fullCalendar({
            header: {
                left: 'prev, next today',
                center: 'title',
                right: 'month, agendaWeek, agendaDay',
            },


            events: booking,
            selectable: isLoggedIn,
            selectHelper: true,
            select: function(startDate, endDate, allDays) {
                if(!isLoggedIn) return;
                start = startDate; // Assign start date to the variable
                end =endDate; // Assign end date to the variable
                $('#bookingModal').modal('toggle');
            },


            editable: function(event) {
                    return isLoggedIn;
            },


            eventDrop: function(event) {
                if(!isLoggedIn) return;
                var id = event.id;
                var start_date = moment(event.start).format('YYYY-MM-DD');
                var end_date = moment(event.end).format('YYYY-MM-DD');
                $.ajax({
                    url: "{{ route('calendar.update', '') }}" + '/' + id,
                    type: "PATCH",
                    dataType: 'json',
                    data: { start_date, end_date },
                    success: function(response) {
                        swal("Great!", "Event updated!", "success");
                    },
                    error: function(error) {
                        console.log(error)
                    },
                });
            },


            eventClick: function(event) {
                if(!isLoggedIn) {
                    swal({
                    title: event.title
                    });
                    return;
                }
                var id = event.id;

                swal({
                    title: "Delete Event?",
                    text: "Are you sure you want to delete this event?",
                    icon: "warning",
                    buttons: {
                        cancel: {
                            text: "Cancel",
                            value: null,
                            visible: true,
                            className: "",
                            closeModal: true,
                        },
                        delete: {
                            text: "Delete",
                            value: "delete",
                            visible: true,
                            className: "btn-danger",
                            closeModal: true,
                        },
                    },
                }).then(function(value) {
                    if (value === "delete") {
                        // Delete the event
                        deleteEvent(id);
                    }
                });

                return false;
            },

        });



        

        $("#bookingModal").on("hidden.bs.modal", function() {
            $('#saveBtn').unbind();
        });

        
        function deleteEvent(id) {
            if(!isLoggedIn) return;
            if (confirm('Are you sure you want to delete this event?')) {
                $.ajax({
                    url: "{{ route('calendar.destroy', '') }}" + '/' + id,
                    type: "DELETE",
                    dataType: 'json',
                    success: function(response) {
                        $('#calendar').fullCalendar('removeEvents', response);
                        swal("Great!", "Event Deleted!", "success");
                    },
                    error: function(error) {
                        console.log(error)
                    },
                });
            }
        }
    });

</script>