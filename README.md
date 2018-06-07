# shareposts2
This is my version of SharePosts that I am making for myself just to
Learn PHP and MVC Design Pattern.

My Ref: Is the Brad Traversy Course on Udemy: "Object Oriented PHP MVC"

In  my version I am doing PHP in the Java Servlet/JSP way (that i know better).

This project uses the same tools of the TraversyMVC framework as: .htaccess files and basic folder structure. 

BUT it changes: 
1. The core libraries is: RequestDispatcher that process the url to call the controller, the action and parameters.
2. Added dynamic configurations that automatically changes base on the environment.
3. The business logic was moved from the controllers to services.
4. The controllers responsability in to call a service base on the REQUEST_METHOD, do access control of the services get the service response and require the view with the appropriate data.
5. The database config is isolated in a file so it wont be uploaded to github, but when the project is up in the heroku it will get env connection.
6. The services has the business logic: 
    6.1. The methods follows the covention: {action-name}On{REQUEST_METHOD}, for example: indexOnGet, addOnPost, aboutOnGet...
    6.2. The methods must always return a ServiceResponse with the viewPath and Data or redirect to a service that does it.
7. The database logic will be retricted to the daos that will be an interface that uses the models as it returns or parameters.
8. The models are database entities clones. They represent the database entity on the app with a consistent form.
9. The $_SESSION will be abstracted from the application and will be handle througth a helper (SessionManager) a not directly.
10. Bootstrap have the global requires of the app.
12. The Controller core lib will load views, have global utility methods to all controller and be extended by the controllers.
13. The Views have includes on the top (header + navbar) and in the bottom (footer).