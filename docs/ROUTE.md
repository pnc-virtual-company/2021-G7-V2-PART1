
### 1. User Routes
---
| HTTP REQUEST| ROUTES | DESCRIPTION |
| :---        | :----   |          :--- |
| POST        | /register       |The route for register users |
| POST        | /login          |The route to login user|

| GET         | /users          |The route for get all users   |
| GET         | /user/{id}      |The route to get a user by given id |
| PUT         | /users/{id}     | The route to update a user by given id |
| DELETE      | /users/{id}     | The route to delete a user|

### 2. Categories Routes
---
| HTTP REQUEST| ROUTES | DESCRIPTION |
| :---        | :----   |          :--- |
| GET         | /categories          |The route for get all categories   |
| GET         | /categories/{id}     |The route to get a category by given id |
| POST        | /categories          |The route to create all category   |
| PUT         | /categories/{id}     | The route to update a category by given id |
| DELETE      | /categories/{id}     | The route to delete a category|
| GET         | /categories/search/{categoryName}     | The route to research a category|

### 3. Event Routes
---
| HTTP REQUEST| ROUTES | DESCRIPTION |
| :---        | :----   |          :--- |
| GET         | /events          |The route for get all events   |
| GET         | /events/{id}     |The route to get a event by given id |
| POST        | /events          |The route to create all events   |
| PUT         | /events/{id}     | The route to update a event by given id |
| DELETE      | /events/{id}     | The route to delete a event|
| GET         | /events/search/{eventName}     | The route to research a event|
