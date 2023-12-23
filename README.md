# Calendar API

The Calendar API is a RESTful API that allows authenticated users to manage events on a calendar. It provides endpoints for retrieving, creating, updating, and deleting events. Additionally, it supports editing events through dragging and dropping, resizing, and changing event colors.

## Features

- Retrieve a list of events
- Add a new event
- Update an existing event
- Delete an event
- Edit events through dragging and dropping
- Resize events by adjusting their duration
- Change event colors

## Technologies Used

- Laravel: A PHP framework for building web applications. It provides a robust and efficient platform for developing APIs with features such as routing, database management, and authentication.

- JavaScript: A programming language commonly used for client-side development. In the context of this project, JavaScript is used to handle frontend interactivity and perform AJAX requests to the API.

- AJAX: Asynchronous JavaScript and XML, a set of web development techniques that allow data to be retrieved from a server asynchronously without interfering with the display and behavior of the existing page.

- PHP: A server-side scripting language used for web development. In this project, PHP is used in conjunction with Laravel to handle server-side processing and interact with the database.

- HTML: The standard markup language for creating web pages. HTML is used to structure the content and layout of the calendar and event forms.

- CSS: A stylesheet language used to describe the visual presentation of a document written in HTML. CSS is used to style the calendar and event elements, providing a visually appealing user interface.

- Visual Studio Code: A popular source code editor that offers a wide range of features and extensions for efficient development. It provides a user-friendly interface for editing code, including HTML, CSS, JavaScript, and PHP files.

## Setup Instructions

To set up the Calendar API on your local machine, follow the instructions below:

1. Clone the project repository:

   ````shell
   git clone https://github.com/zhuwaao/Event_Schedular/tree/master
   ```

2. Open the project folder in Visual Studio Code or your preferred code editor.

3. Install the required dependencies by running the following command in the terminal:

   ````shell
   composer install
   ```

4. Create a copy of the `.env.example` file and rename it to `.env`. Update the necessary configuration values such as the database credentials.

5. Generate a new application key by running the following command:

   ````shell
   php artisan key:generate
   ```

6. Run the database migrations to create the required tables:

   ````shell
   php artisan migrate
   ```

7. Start the development server:

   ````shell
   php artisan serve
   ```

8. The API server will start running at `http://localhost:8000`. You can now make requests to the API endpoints using AJAX requests from your frontend application.

## API Endpoints

The Calendar API provides the following endpoints:

- `GET /events`: Retrieves a list of events.
- `POST /events`: Adds a new event.
- `PUT /events/{eventId}`: Updates an existing event.
- `DELETE /events/{eventId}`: Deletes an event.

For detailed information about each endpoint, including request and response formats, please refer to the API documentation.

## Authentication and Authorization

The Calendar API utilizes authentication and authorization to secure the endpoints. Only logged-in users can manipulate data, while unauthenticated users can only view the events.

To authenticate a user, send a `POST` request to the `/login` endpoint with valid credentials. Upon successful authentication, the API will provide an access token, which should be included in subsequent requests as an `Authorization` header with the value `Bearer {token}`.

It is recommended to implement suitable authentication and authorization methods before deploying the API to production, such as using JSON Web Tokens (JWT) or OAuth.

## Editing Events

The Calendar API supports various editing capabilities for events, including dragging and dropping, resizing, and changing event colors.

### Dragging and Dropping

Dragging and dropping enables users to move events to different time slots within the calendar. To perform dragging and dropping:

1. Select an event by clicking and holding the mouse button.

2. While holding the mouse button, drag the event to the desired time slot.

3. Release the mouse button to drop the event into the new time slot.

Once dropped, the API will automatically update the event's start and end times to reflect the new position.

### Resizing

Resizing allows users to adjust the duration of events. To resize an event:

1. Select the edge or corner of an event.

2. Click and hold the mouse button.

3. While holding the mouse button, drag the edge or corner to increase or decrease the event's duration.

4. Release the mouse button to finalize the resize.

The API will update the event's end time based on the resized duration.

### Changing Event Colors

The Calendar API also supports changing the color of events. Users can update an event's color by sending a `PUT` request to the `/events/{eventId}` endpointwith the desired color value in the request body. The API will update the event's color accordingly.

Please refer to the API documentation for detailed instructions on how to perform these editing operations and the specific request and response formats.

## Contribution

Contributions to the Calendar API are welcome! If you find any issues or have suggestions for improvements, please create a GitHub issue or submit a pull request.

## License

This project is licensed under the MIT License. Please refer to the [LICENSE](LICENSE) file for more information.
