# shareposts2
TESTANDO: This is my version of SharePosts that I am making for myself just to
Learn PHP and MVC Design Pattern.

In  my version I am doing PHP in the Java Servlet/JSP way (that i know better).

This project uses the same tools of the TraversyMVC as: .htaccess and basic folder structure. BUT it changes: 
1. The core libraries
2. Added dynamic configurations that automatically changes base on the environment 
3. The logic was moved from the controllers to services
4. The controller responsability is only to call the right service to request the data for that view and require the view with the data.
5. The Core is changed to RequestDispatcher. Witch gets the URL and process it, defining the controller, action and params passed.

My Ref: Is the Brad Traversy Course on Udemy: "Object Oriented PHP MVC" 