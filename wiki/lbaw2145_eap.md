# EAP: Architecture Specification and Prototype

In the middle of a pandemic, we wanted to provide a social network to link people, so that the distancing is only physical.


## A7: High-level architecture. Privileges. Web resources specification

In this artefact we are going to present our architecture to be implemented, specifying the resources and its properties with references to the work done in A3.

### 1. Overview 

|Module  |Description|
| --------------- | ----------------------------------- |                  
|**M01: Authentication and Registration**   | Web resources associated with user authentication and registration, includes the following system features: login/logout, registration.  |
|**M02: Users and Links**  | Web resources associated with the users and their links, includes the following system features: user, edit a user, delete a user, see his links, create a link, search for users. |
|**M03: Posts and Comments**  | Web resources associated with posting, includes the following system features: post, edit a post, like, comment, edit a comment, report a post, report a comment, search for posts. |
|**M04: Groups**  | Web resources associated with groups, includes the following system features: create a group, view a group page, search for group.  |
|**M05: Administration**  | Web resources associated with user management, includes the following system features: ban a post, ban a comment, see all reports. |
|**M06: Other Routes**  | Web resources associated with other routes, includes the following system features: routes to home page, about page, create_group page, faq page. |

### 2. Permissions

|  |Permission|Description|
| --------------- | ----------------------------------- | - |
| **PUB** | Public         | Users without privileges |
| **USR** | User           | Authenticated user       |
| **OWN** | Owner          | Owner of the information (e.g. posts, comment)  |
| **MMB** | Member          | Member (e.g. groups)  |
| **ADM** | Administrator  | Administrators |

### 3. OpenAPI Specification

OpenAPI specification in YAML format to describe the web application's web resources.

[a7_openapi.yaml](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2145/-/blob/master/a7_openapi.yaml)

[SwaggerHub](https://app.swaggerhub.com/apis/Xavier-Pisco/LiNK.ME/1.0#/)

```yaml

openapi: 3.0.0

info:
    version: "1.0"
    title: "LBAW LiNK.ME Web API"
    description: "Web Resources Specification (A7) for LiNK.ME"

servers:
    -   url: http://lbaw-prod.fe.up.pt
        description: Production server

tags:
    -   name: "M01: Authentication and Registration"
    -   name: "M02: Users and Links"
    -   name: "M03: Posts and Comments"
    -   name: "M04: Groups"
    -   name: "M05: Administration"
    -   name: "M06: Other routes"

paths:
    /login:
        get:
            operationId: R101
            summary: "R101: Login Form"
            description: "Provide login form. Access: PUB"
            tags:
                - "M01: Authentication and Registration"
            responses:
                "200":
                    description: "Ok. Show [UI04](http://lbaw2145-piu.lbaw-prod.fe.up.pt/login.php)"
        post:
            operationId: R102
            summary: "R102: Login Action"
            description: "Processes the login form submission. Access: PUB"
            tags:
                - "M01: Authentication and Registration"

            requestBody:
                required: true
                content:
                    application/x-www-form-urlencoded:
                        schema:
                            type: object
                            properties:
                                username:
                                    type: string
                                password:
                                    type: string
                            required:
                                - username
                                - password
            responses:
                "302":
                    description: "Redirect after processing the login credentials."
                    headers:
                        Location:
                            schema:
                                type: string
                                example:
                                    302Success:
                                        description: "Successful authentication. Redirect to Home."
                                        value: "/home"
                                    302Error:
                                        description: "Failed authentication. Redirect to login."
                                        value: "/login"

    /logout:
        post:
            operationId: R103
            summary: "R103: Logout Action"
            description: "Logout the current authenticated user. Access: USR, ADM"
            tags:
                - "M01: Authentication and Registration"
            responses:
                "302":
                    description: "Redirect after processing logout."
                    headers:
                        Location:
                            schema:
                                type: string
                                example:
                                    302Success:
                                        description: "Successful logout. Redirect to login form."
                                        value: "/login"

    /register:
        get:
            operationId: R104
            summary: "R104: Register Form"
            description: "Provide register form. Access: PUB"
            tags:
                - "M01: Authentication and Registration"
            responses:
                "200":
                    description: "Ok. Show [UI05](http://lbaw2145-piu.lbaw-prod.fe.up.pt/register.php)"
        post:
            operationId: R105
            summary: 'R105: Register Action'
            description: 'Processes the new user registration form submission. Access: PUB'
            tags:
                - 'M01: Authentication and Registration'

            requestBody:
                required: true
                content:
                    application/x-www-form-urlencoded:
                        schema:
                            type: object
                            properties:
                                name:
                                    type: string
                                email:
                                    type: string
                                password:
                                    type: string
                            required:
                                - name
                                - email
                                - password
            responses:
                '302':
                    description: 'Redirect after processing the new user information.'
                    headers:
                        Location:
                            schema:
                                type: string
                                example:
                                    302Success:
                                        description: 'Successful authentication. Redirect to user profile.'
                                        value: '/user/{id}'
                                    302Failure:
                                        description: 'Failed authentication. Redirect to login page.'
                                        value: '/login'

    /recover:
        get:
            operationId: R106
            summary: "R106: Get Password Recovery Form"
            tags:
                - "M01: Authentication and Registration"
            responses:
                "200":
                    description: "Ok. Show password recovery UI"
        post:
            operationId: R107
            summary: 'R107: Password Recovery Action'
            description: 'Processes the password recovery form submission. Access: PUB'
            tags:
                - 'M01: Authentication and Registration'

            requestBody:
                required: true
                content:
                    application/x-www-form-urlencoded:
                        schema:
                            type: object
                            properties:
                                email:
                                    type: string
                            required:
                                - email
            responses:
                "302":
                    description: "Redirect after processing password recovery."
                    headers:
                        Location:
                            schema:
                                type: string
                                example:
                                    302Success:
                                        description: "Successful password recovery. Redirect to login form."
                                        value: "/login"
    
    /user/{id}:
        get:
            operationId: R201
            summary: "R201: User profile"
            description: "Provide individual user profile page. Access: PUB"
            tags:
                - "M02: Users and Links"
            parameters:
              - in: path
                name: id
                description: 'Identifier from user'
                schema:
                    type: integer
                required: true
            responses:
                "200":
                    description: "Ok. Show [UI07](http://lbaw2145-piu.lbaw-prod.fe.up.pt/profile.php)"
                "302":
                    description: "Redirect after failing to get the requested profile."
                    headers:
                        Location:
                            schema:
                                type: string
                                example:
                                    302Failure:
                                        description: 'Redirect to home page.'
                                        value: '/home'

    /api/user:
        post:
            operationId: R202
            summary: "R202: User Info"
            description: "Provide individual user info in JSON. Access: PUB"
            tags:
                - "M02: Users and Links"
            
            requestBody:
                required: true
                content:
                    application/x-www-form-urlencoded:
                        schema:
                            type: object
                            properties:
                                id:
                                    type: integer
                            required:
                                - id
            responses:
                '200':
                    description: 'Success.'
                    content:
                        application/json:  
                            schema:
                                type: object
                                properties:
                                    user_id:
                                        type: integer
                                    username:
                                        type: string
                                    name:
                                        type: string
                                example:
                                  - user_id: 1
                                    username: "xamas"
                                    name: "Xavier"
        put:
            operationId: R203
            summary: "R203: Change user info"
            description: "Change a users info. Access: OWN"
            tags:
                - "M02: Users and Links"
            
            requestBody:
                required: true
                content:
                    application/x-www-form-urlencoded:
                        schema:
                            type: object
                            properties:
                                id:
                                    type: integer
                                name:
                                    type: string
                                password:
                                    type: string
                            required:
                                - id
            responses:
                "200":
                    description: "Ok. Show [UI07](http://lbaw2145-piu.lbaw-prod.fe.up.pt/profile.php)"
    
    /api/user/{id}:
        delete:
            operationId: R204
            summary: "R204: Delete user"
            description: "Delete a user account. Access OWN"
            tags:
                - "M02: Users and Links"
            
            parameters:
              - in: path
                name: id
                description: 'Identifier from user'
                schema:
                    type: integer
                required: true
            responses:
                "200":
                    description: "Ok. Show [UI04](http://lbaw2145-piu.lbaw-prod.fe.up.pt/login.php)"


    /api/link:
        get:
            operationId: R205
            summary: "R205: Get links from a specific user"
            description: "Provide links of a specific user in JSON format. Access: USR, ADM"
            tags:
                - "M02: Users and Links"
            parameters:
              - in: query
                name: id
                description: "Identifier from user"
                schema:
                    type: integer
                required: true
            responses:
                "200":
                    description: "Success."
                    content:
                        application/json:  
                            schema:
                                type: array
                                items:
                                    type: object
                                    properties:
                                        user_id:
                                            type: integer
                                        username:
                                            type: string
                                        name:
                                            type: string
                                example:
                                  - user_id: 1
                                    username: "xamas"
                                    name: "Xavier"
                                  - user_id: 5
                                    username: "johnlewis"
                                    name: "John Lewis"
                                  - user_id: 19
                                    username: "mike"
                                    name: "Litoris"
        post:
            operationId: R206
            summary: "R206: Link 2 users"
            description: "Create a friendship between 2 users. Access: USR"
            tags:
                - "M02: Users and Links"
            requestBody:
                required: true
                content:
                    application/x-www-form-urlencoded:
                        schema:
                            type: object
                            properties:
                                user1_id:
                                    type: integer
                                user2_id:
                                    type: integer
                            required:
                                - user1_id
                                - user2_id
            responses:
                "204":
                    description: "No Content"

        

    /users:
        get:
            operationId: R207
            summary: "R207: Search for a user from a string"
            description: "Shows all users that have a name or username similar to the search. Access: PUB"
            tags:
                - "M02: Users and Links"
            parameters:
              - in: query
                name: searched
                description: String to use for full-text search
                schema:
                    type: string
                required: true

            responses:
                "200":
                    description: "Ok. Show [UI09](http://lbaw2145-piu.lbaw-prod.fe.up.pt/search_people.php)"
                "302":
                    description: "Redirect after failing to process the search."
                    headers:
                        Location:
                            schema:
                                type: string
                                example:
                                    302Failure:
                                        description: 'Redirect to home page.'
                                        value: '/home'

    /post/{id}:
        get:
            operationId: R301
            summary: "R301: Post page"
            description: "Provide individual post page. Access: PUB"
            tags:
                - "M03: Posts and Comments"
            parameters:
              - in: path
                name: id
                description: 'Identifier from post'
                schema:
                    type: integer
                required: true
            responses:
                "200":
                    description: "Ok. Show [UI06](http://lbaw2145-piu.lbaw-prod.fe.up.pt/post.php)"
                "302":
                    description: "Redirect after failing to get the requested post."
                    headers:
                        Location:
                            schema:
                                type: string
                                example:   
                                    302Failure:
                                        description: 'Redirect to home page.'
                                        value: '/home'

    /api/post:
        get:
            operationId: R302
            summary: "R302: Post info"
            description: "Provide individual post info in JSON format. Access: PUB"
            tags:
                - "M03: Posts and Comments"
            parameters:
              - in: query
                name: id
                description: 'Identifier from post'
                schema:
                    type: integer
                required: true
            responses:
                '200':
                    description: 'Success.'
                    content:
                        application/json:  
                            schema:
                                type: object
                                properties:
                                    user_id:
                                        type: integer
                                    picture:
                                        type: string
                                    descritpion:
                                        type: string
                                    date:
                                        type: string
                                    group_id:
                                        type: integer
                                    likes:
                                        type: integer
                                    dislikes:
                                        type: integer
                                example:
                                  - user_id: 1
                                    picture: Null
                                    description: "What a nice shot!!"
                                    date: "10-04-2020"
                                    group_id: Null
                                    likes: 12
                                    dislikes: 2
        post:
            operationId: R303
            summary: "R303: Create a post"
            description: "Create a post. Access: USR"
            tags:
                - "M03: Posts and Comments"
            requestBody:
                required: true
                content:
                    application/x-www-form-urlencoded:
                        schema:
                            type: object
                            properties:
                                user_id:
                                    type: integer
                                picture:
                                    type: string
                                description:
                                    type: string
                                private:
                                    type: boolean
                                group_id:
                                    type: integer
                            required:
                                - user_id
            responses:
                "200":
                    description: "Ok. Show [UI01](http://lbaw2145-piu.lbaw-prod.fe.up.pt)"

    /api/post/{id}:
        delete:
            operationId: R304
            summary: "R304: Delete post"
            description: "Delete a post from user. Access OWN"
            tags:
                - "M03: Posts and Comments"
            
            parameters:
              - in: path
                name: id
                description: 'Identifier from post'
                schema:
                    type: integer
                required: true
            responses:
                "200":
                    description: "Ok. Show [UI01](http://lbaw2145-piu.lbaw-prod.fe.up.pt)"

        put:
            operationId: R305
            summary: "R305: Edit a post"
            description: "Edit a post. Access: USR"
            tags:
                - "M03: Posts and Comments"
            parameters:
              - in: path
                name: id
                description: 'Identifier from post'
                schema:
                    type: integer
                required: true
            requestBody:
                required: true
                content:
                    application/x-www-form-urlencoded:
                        schema:
                            type: object
                            properties:
                                description:
                                    type: string
                                private:
                                    type: boolean
            responses:
                "200":
                    description: "Ok. Show [UI01](http://lbaw2145-piu.lbaw-prod.fe.up.pt)"

    /api/like/{id}:
        get:
            operationId: R306
            summary: "R306: Likes and dislikes from a post"
            description: "Get likes and dislikes from a post. Access: PUB"
            tags:
                - "M03: Posts and Comments"
            parameters:
              - in: path
                name: id
                description: 'Identifier from post'
                schema:
                    type: integer
                required: true
                
            responses:
                "200":
                    description: "Success"
                    content:
                        application/json:  
                            schema:
                                type: array
                                items:
                                    type: object
                                    properties:
                                        user_id:
                                            type: integer
                                        likes:
                                            type: boolean
                                example:
                                  - user_id: 15
                                    likes: true
                                  - user_id: 32
                                    likes: false
                                  - user_id: 27
                                    likes: true

        post:
            operationId: R317
            summary: "R317: Like or dislike a post"
            description: "Like or dislike a post. Access: USR"
            tags:
                - "M03: Posts and Comments"
            parameters:
              - in: path
                name: id
                description: 'Identifier from post'
                schema:
                    type: integer
                required: true
            requestBody:
                required: true
                content:
                    application/x-www-form-urlencoded:
                        schema:
                            type: object
                            properties:
                                description:
                                    type: string
                                private:
                                    type: boolean
            responses:
                "204":
                    description: "No content"
        put:
            operationId: R307
            summary: "R307: Like or dislike a post"
            description: "Like or dislike a post. Access: USR"
            tags:
                - "M03: Posts and Comments"
            parameters:
              - in: path
                name: id
                description: 'Identifier from post'
                schema:
                    type: integer
                required: true
              - in: query
                name: likes
                description: "Like or dislike"
                schema:
                    type: boolean
                required: true
            responses:
                "204":
                    description: "No content"
        
        delete:
            operationId: R308
            summary: "R308: Remove a like or a dislike"
            description: "Remove a like or a dislike from a post. Access: USR"
            tags:
                - "M03: Posts and Comments"
            parameters:
              - in: path
                name: id
                description: 'Identifier from post'
                schema:
                    type: integer
                required: true
            responses:
                "204":
                    description: "No content"
 
    /api/post/report/{id}:
        post:
            operationId: R309
            summary: "R309: Report a post"
            description: "Report a post. Access: USR"
            tags:
                - "M03: Posts and Comments"
            parameters:
              - in: path
                name: id
                description: 'Identifier from post'
                schema:
                    type: integer
                required: true
            responses:
                "204":
                    description: "No content"

    /posts:
        get:
            operationId: R310
            summary: "R310: Search for a post from a string"
            description: "Shows all posts that have a name or username similar to the search. Access: PUB"
            tags:
                - "M03: Posts and Comments"
            parameters:
              - in: query
                name: searched
                description: String to use for full-text search
                schema:
                    type: string
                required: true

            responses:
                "200":
                    description: "Ok. Show [UI09](http://lbaw2145-piu.lbaw-prod.fe.up.pt/search_people.php)"
                "302":
                    description: "Redirect after failing to process the search."
                    headers:
                        Location:
                            schema:
                                type: string
                                example:
                                    302Failure:
                                        description: 'Redirect to home page.'
                                        value: '/home'

    /api/comment:
        get:
            operationId: R311
            summary: "R311: Comments from post"
            description: "Provide comments from a post in JSON format. Access: PUB"
            tags:
                - "M03: Posts and Comments"
            parameters:
              - in: query
                name: id
                description: 'Identifier from post'
                schema:
                    type: integer
                required: true
            responses:
                '200':
                    description: 'Success.'
                    content:
                        application/json:  
                            schema:
                                type: array
                                items:
                                    type: object
                                    properties:
                                        id:
                                            type: integer
                                        user_id:
                                            type: integer
                                        text:
                                            type: string
                                example:
                                  - id: 1
                                    user_id: 7
                                    text: "Fabulous!"
                                  - id: 5
                                    user_id: 9
                                    text: "Kinda boring"
        post:
            operationId: R312
            summary: "R312: Create a comment"
            description: "Create a comment. Access: USR"
            tags:
                - "M03: Posts and Comments"
            requestBody:
                required: true
                content:
                    application/x-www-form-urlencoded:
                        schema:
                            type: object
                            properties:
                                user_id:
                                    type: integer
                                post_id:
                                    type: integer
                                text:
                                    type: string
                            required:
                                - user_id
                                - post_id
                                - text
            responses:
                "200":
                    description: "Ok. Show [UI01](http://lbaw2145-piu.lbaw-prod.fe.up.pt)"

    /api/comment/{id}:
        get:
            operationId: R313
            summary: "R313: HTML comment"
            description: "Get the html for a specific comment. Access PUB"
            tags:
                - "M03: Posts and Comments"
            
            parameters:
              - in: path
                name: id
                description: 'Identifier from comment'
                schema:
                    type: integer
                required: true
            responses:
                '200':
                    description: 'Success. Returns HTML for the comment'
        delete:
            operationId: R314
            summary: "R314: Delete comment"
            description: "Delete a comment from user. Access OWN"
            tags:
                - "M03: Posts and Comments"
            
            parameters:
              - in: path
                name: id
                description: 'Identifier from comment'
                schema:
                    type: integer
                required: true
            responses:
                "200":
                    description: "Ok. Show [UI01](http://lbaw2145-piu.lbaw-prod.fe.up.pt)"
        put:
            operationId: R315
            summary: "R315: Edit a comment"
            description: "Edit a comment. Access: OWN"
            tags:
                - "M03: Posts and Comments"
            
            parameters:
              - in: path
                name: id
                description: 'Identifier from comment'
                schema:
                    type: integer
                required: true

            requestBody:
                required: true
                content:
                    application/x-www-form-urlencoded:
                        schema:
                            type: object
                            properties:
                                text:
                                    type: string
                            required:
                                - text
            responses:
                "200":
                    description: "Ok. Show [UI01](http://lbaw2145-piu.lbaw-prod.fe.up.pt)"

    /api/comment/report/{id}:
        post:
            operationId: R316
            summary: "R316: Report a comment"
            description: "Report a comment. Access: USR"
            tags:
                - "M03: Posts and Comments"
            parameters:
              - in: path
                name: id
                description: 'Identifier from comment'
                schema:
                    type: integer
                required: true
            responses:
                "204":
                    description: "No content"

    /group/{id}:
        get:
            operationId: R401
            summary: "R401: Group page"
            description: "Provide individual group page. Access: MMB, ADM"
            tags:
                - "M04: Groups"
            parameters:
              - in: path
                name: id
                description: 'Identifier from group'
                schema:
                    type: integer
                required: true
            responses:
                "200":
                    description: "Ok. Show [UI11](http://lbaw2145-piu.lbaw-prod.fe.up.pt/group_page.php)"
                "302":
                    description: "User is not a member."
                    headers:
                        Location:
                            schema:
                                type: string
                                example:
                                    302Error:
                                        description: "Not a member. Redirect to login."
                                        value: "/login"


    /group:
        get:
            operationId: R402
            summary: "R402: Create group page"
            description: "Provide create group page. Access: PUB"
            tags:
                - "M04: Groups"
            responses:
                "200":
                    description: "Ok. Show [UI10](http://lbaw2145-piu.lbaw-prod.fe.up.pt/create_group.php)"
                "302":
                    description: "User is not authenticated."
                    headers:
                        Location:
                            schema:
                                type: string
                                example:
                                    302Error:
                                        description: "Not authenticated. Redirect to login."
                                        value: "/login"

    /api/group:
        get:
            operationId: R403
            summary: "R403: Group info for user"
            description: "Provide user's groups info in JSON format. Access: MMB, ADM"
            tags:
                - "M04: Groups"
            parameters:
              - in: query
                name: id
                description: 'Identifier from group'
                schema:
                    type: integer
                required: true
            responses:
                '200':
                    description: 'Success.'
                    content:
                        application/json:  
                            schema:
                                type: array
                                items:
                                    type: object
                                    properties:
                                        id:
                                            type: integer
                                        name:
                                            type: string
                                example:
                                  - id: 2
                                    name: MIEIC
                                  - id: 5
                                    name: LBAW
        post:
            operationId: R404
            summary: "R404: Create a group"
            description: "Create a group. Access: USR"
            tags:
                - "M04: Groups"
            requestBody:
                required: true
                content:
                    application/x-www-form-urlencoded:
                        schema:
                            type: object
                            properties:
                                name:
                                    type: integer
                            required:
                                - name
            responses:
                "200":
                    description: "Ok. Show [UI11](http://lbaw2145-piu.lbaw-prod.fe.up.pt/group_page.php)"


    /groups:
        get:
            operationId: R405
            summary: "R405: Search for a group from a string"
            description: "Shows all groups that have a name similar to the search. Access: PUB"
            tags:
                - "M04: Groups"
            parameters:
              - in: query
                name: searched
                description: String to use for full-text search
                schema:
                    type: string
                required: true

            responses:
                "200":
                    description: "Ok. Show [UI09](http://lbaw2145-piu.lbaw-prod.fe.up.pt/search_groups.php)"


    /api/comment/ban/{id}:
        delete:
            operationId: R501
            summary: "R501: Ban comment"
            description: "Ban a comment from user. Access ADM"
            tags:
                - "M05: Administration"
            parameters:
              - in: path
                name: id
                description: 'Identifier from comment'
                schema:
                    type: integer
                required: true
            responses:
                "200":
                    description: "Ok. Show [UI12](http://lbaw2145-piu.lbaw-prod.fe.up.pt/admin.php)"

    /api/post/ban/{id}:
        delete:
            operationId: R502
            summary: "R502: Ban post"
            description: "Ban a post from user. Access ADM"
            tags:
                - "M05: Administration"
            parameters:
              - in: path
                name: id
                description: 'Identifier from post'
                schema:
                    type: integer
                required: true
            responses:
                "200":
                    description: "Ok. Show [UI12](http://lbaw2145-piu.lbaw-prod.fe.up.pt/admin.php)"

    /api/reports:
        get:
            operationId: R503
            summary: "R502: Get all reports"
            description: "Get all reports. Access ADM"
            tags:
                - "M05: Administration"
            responses:
                "200":
                    description: 'Success.'
                    content:
                        application/json:  
                            schema:
                                type: array
                                items:
                                    type: object
                                    properties:
                                        id:
                                            type: integer
                                        user_id:
                                            type: integer
                                        post_id:
                                            type: integer
                                        comment_id:
                                            type: integer
                                example:
                                  - id: 2
                                    user_id: 4
                                    post_id: 25
                                    comment_id: Null
                                  - id: 5
                                    user_id: 27
                                    post_id: Null
                                    comment_id: 13

                    
    /home:
        get:
            operationId: R601
            summary: "R601: Home page"
            description: "Provide home page. Access: PUB"
            tags:
                - "M06: Other routes"
            responses:
                "200":
                    description: "Ok. Show [UI01](http://lbaw2145-piu.lbaw-prod.fe.up.pt/)"
                "302":
                    description: "User is not authenticated."
                    headers:
                        Location:
                            schema:
                                type: string
                                example:
                                    302Error:
                                        description: "Not authenticated. Redirect to login."
                                        value: "/login"

    /about:
        get:
            operationId: R602
            summary: "R602: About page"
            description: "Provide about page. Access: PUB"
            tags:
                - "M06: Other routes"
            responses:
                "200":
                    description: "Ok. Show [UI02](http://lbaw2145-piu.lbaw-prod.fe.up.pt/about.php)"
    /faq:
        get:
            operationId: R603
            summary: "R603: FAQ page"
            description: "Provide FAQ page. Access: PUB"
            tags:
                - "M06: Other routes"
            responses:
                "200":
                    description: "Ok. Show [UI03](http://lbaw2145-piu.lbaw-prod.fe.up.pt/faq.php)"
```

---


## A8: Vertical prototype

In this artefact we present a portion of the final product, containing the implementation of two of the main user stories. The implementation is based off the LBAW Framework and includes work on various layers of the architecture of the solution. It serves as a demonstration of the technologies used and what will be developed in the future. 

### 1. Implemented Features

#### 1.1. Implemented User Stories

The user stories we implemented are described in this table. 

| User Story reference | Name                   | Priority                   | Description                   |
| -------------------- | ---------------------- | -------------------------- | ----------------------------- |
| US002 | Read Public Posts | High | As a User, I want to read public posts, so that I can keep up with public lives.|
| US004 | Read Public Comments | High | As a User, I want to be able to open the comments of a public post, so that I can read them.|
| US006 | See About Page | High |As a User, I want to be able to see an about page, so that I can get some more information about the webapp and its creators. |
| US101                 | Log in | High |As a Guest, I want to be able to log in, so that I can become a Authenticated User.|
| US102 | Register|High|As a Guest, I want to be able to register, so that I can create an account to log into.|
| US202 | Comment|High|As an Authenticated User, I want to be able to comment a post, so that my opinion on that post is stated.|
| US204 | Like a Post|High|As an Authenticated User, I want to be able to like a post, so that I can show my appreciation.|
| US205 | Logout|High|As an Authenticated User, I want to be able to log out of my account, so that I can become a Guest.|
| US301 | Remove a post|Medium|As an Owner of a post, I want to be able to remove a post that I created, so that no one can see it again.|
| US302 | Remove a comment|Medium|As an Owner of a comment, I want to be able to remove a comment of mine, so that no one can see it again.|


#### 1.2. Implemented Web Resources  

Module M01: Authentication and Registration

| Web Resource Reference | URL                            |
| ---------------------- | ------------------------------ |
| R101: Login form | [/login](lbaw2145.lbaw-prod.fe.up.pt/login) |
| R102: Login action | Post /login |
| R103: Logout action | Post /logout |
| R104: Register form | [/register](lbaw2145.lbaw-prod.fe.up.pt/register)|
| R105: Register action | Post /register |

Module M03: Posts and Comments

| Web Resource Reference | URL                            |
| ---------------------- | ------------------------------ |
| R301: Post page | [/post/{id}](lbaw2145.lbaw-prod.fe.up.pt/post/1) |
| R302: Post info | GET /api/post |
| R306: Get likes and dislikes from a post | GET /api/like/{id}|
| R307: Like or dislike a post | POST /api/like/{id} |
| R308: Remove a like or dislike | DELETE /api/like/{id} |
| R312: Create comment | POST /api/comment/{id} |
| R313: HTML comment | GET /api/comment/{id} |
| R314: Delete comment | DELETE /api/comment/{id} |
| R317: Like or dislike a post | PUT /api/like/{id} |

Module M05: Other routes

| Web Resource Reference | URL                            |
| ---------------------- | ------------------------------ |
| R502: About page | [/about](lbaw2145.lbaw-prod.fe.up.pt/about) |


### 2. Prototype

Our prototype is in http://lbaw2145.lbaw-prod.fe.up.pt/

Credentials:
    - regular user: xamas/password
    - admin functionalities not yet implemented

Our code is in https://git.fe.up.pt/lbaw/lbaw2021/lbaw2145/-/tree/master/laravel


---



## Revision history


***
GROUP2145, 06/05/2021
 
* João Miguel Gomes Gonçalves, [up201806796@fe.up.pt](mailto:up201806796@fe.up.pt) (editor)
* Nuno Filipe Ferreira de Sousa Resende, [up201806825@fe.up.pt](mailto:up201806825@fe.up.pt) 
* Pedro Miguel Pires Coelho, [up201806802@fe.up.pt](mailto:up201806802@fe.up.pt)
* Xavier Ruivo Pisco, [up201806134@fe.up.pt](mailto:up201806134@fe.up.pt)

