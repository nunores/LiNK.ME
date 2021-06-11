
# PA: Product and Presentation

In the middle of a pandemic, we wanted to provide a social network to link people, so that the distancing is only physical.

## A9: Product

In this artefact we intend to show our final product and its features, how to install and use the webapp and finally the presentation  of the validations.

Our web app is a place where you can share your life with everyone, or only your friends, through posts, and interact with them by liking, or a disliking, and comment whatever you want.

We are constantly trying our best to make this web app fastly readable in order to be a quick break from the everyday concerns during the pandemic.

If you want to join other people you can link yourself to them and be closer or you can create a group and invite anyone you want to be in it.

### 1. Installation

Our code for this project as the 4th of June can be found [here](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2145/-/tree/PA/laravel)

To run our docker image using the DBM database use the following command:
- docker run -it -p 8000:80 -e DB_DATABASE="lbaw2145" -e DB_USERNAME="lbaw2145" -e DB_PASSWORD="IK904155" lbaw2145/lbaw2145 


### 2. Usage
The product can be used in the link below while connected to FEUP VPN:

http://lbaw2145.lbaw-prod.fe.up.pt  

#### 2.1. Administration Credentials

To login to administration login with the following credentials

| Username | Password |
| -------- | -------- |
| zaphrak    | safest |

#### 2.2. User Credentials

| Type          | Username  | Password |
| ------------- | --------- | -------- |
| basic account | xamas    | password |

### 3. Application Help

If the user tries anything outside of his allowed actions, he will get an error, followed by the possiblity to correct the input and redo the action. Aside from that, there is a clickable contextual help button while trying to add a new posts.
We believe that all the other actions are self-explanatory and require no additional critical informaition to proceed.
 

### 4. Input Validation

When it comes to input validation, we used different methods to ensure the product's stability and security.

On the frontend, we used some HTML's built-in properties and input types, for example, when a user is [creating an account](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2145/-/blob/master/laravel/resources/views/auth/register.blade.php#L20), and some JS validation for [password changing](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2145/-/blob/master/laravel/public/js/change_password.js#L11).

On the backend, we have some verifications that are the same as the verifications on the frontend and have redundancy purposes, for example, in our [register](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2145/-/blob/master/laravel/app/Http/Controllers/Auth/RegisterController.php#L51).


### 5. Check Accessibility and Usability

Results for the accessibility and usability forms.

[Accessibility](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2145/-/blob/master/docs/validations/Accessibility.pdf): 11/18
[Usability](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2145/-/blob/master/docs/validations/Usability.pdf): 23/28  

### 6. HTML & CSS Validation

Validation for the HTML and CSS.

The HTML used was the HTML for the [Home Page](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2145/-/blob/master/docs/validations/home.html) and the [Profile Page](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2145/-/blob/master/docs/validations/profile.html) and the results were [home page validation](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2145/-/blob/master/docs/validations/Home.pdf) and [profile page validation](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2145/-/blob/master/docs/validations/Profile.pdf)

We validated [every line of CSS](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2145/-/blob/master/docs/validations/CSS.css) in our project and the results can be found in [CSS Validation](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2145/-/blob/master/docs/validations/CSS_Validation.css)


### 7. Revisions to the Project

We added 2 User stories to the ER:
- US012: Search Groups
- US215: View a group page

We added and updated various routes on EAP:
- R208: Change user name
- R209: Change user password
- R210: Change user picture
- R206: Link 2 users
- R211: Reject link request
- R212: Create link request
- R319: Create post form
- R318: Get post info
- R320: Change posts order
- R321: Retrieves posts for infinite scrolling
- R322: Change a post visibility
- R406: Create a group request


### 8. Implementation Details

#### 8.1. Libraries Used

We used no libraries in our project. 


#### 8.2 User Stories

| US Identifier | Name    | Module | Priority                       | Team Members               | State  |
| ------------- | ------- | ------ | ------------------------------ | -------------------------- | ------ |
| US101 |Log in|Module  M01|High|**Live share**|100%
| US102 |Register|Module M01|High|**Live share**|100%
| US002 |Read Public Posts |Module M03| High |**Live share**|100%|
| US004 |Read Public Comments |Module M03| High |**Live share**|100%|
| US202 |Comment|Module M03|High|**Live share**|100%|
| US204 |Like a Post|Module M03|High|**Live share**|100%|
| US205 |Logout|Module M01|High|**Live share**|100%|
| US301 |Remove a post|Module M03|Medium|**Live share**|100%|
| US302 |Remove a comment|Module M03|Medium|**Live share**|100%|
| US006 |See About Page|Module M05|High|**Live share**|100%|
| US007 |See FAQ Page|Module M05|High|**Xavier Pisco**|100%|
| US201 |Post|Module M01|High|**Xavier Pisco**|100%|
| US003 |See Public Profiles|Module M02|High|**Pedro Coelho** |100%|
| US215 |View a group page| Module M04| High|**Xavier Pisco**|100%|
| US008 |Search Posts|Module M03|High|**João Gonçalves**|100%|
| US005 |Search Groups|Module M04|High|**Nuno Resende**|100%|
| US208 |Send friend request|Module M02|High|**Pedro Coelho**|100%|
| US005 |Search Profiles|Module M02|High|**Nuno Resende**|100%|
| US211 |Add friends to a group|Module M04|High|**Xavier Pisco**|100%|
| US210 |Create a Group|Module M04|High|**Nuno Resende**|100%|
| US401 |Delete other's post|Module M05|High|**Xavier Pisco**|100%|
| US402 |Delete other's comments|Module M05|High|**Xavier Pisco**|100%|
| US203 |Report|Module M03|High|**Xavier Pisco**|100%|
| US209 |See private posts|Module M03|High|**Xavier Pisco**|100%| 
| US001 |See Home Page|Module M05|High|**João Gonçalves**|100%|
| US207 |Delete Account|Module M03|High|**João Gonçalves**|100%|
| US206 |View/Edit own profile|Module M02|High|**Pedro Coelho**|100%|
| US103 |Recover Password|Module M01|High|**Xavier Pisco**|10%|

---

## A10: Presentation

This artefact includes a product presentation, where the main features are summarized, and a video to help with that presentation.
 
### 1. Product presentation

Most people don't like working from home due to all the distractions they are faced with. How many times have we taken a 'short' break from our work just to find ourselves wasting much more time than we anticipated looking at our social media? Thats why <span>LiNK.ME</span> is the perfect social media for people who are working from home. It provides fast readability with a clean interface to stop people from wasting too much time on it.
The user can post whatever he wants, as well as keep up with everything that his friends are doing with a quick search. He is also able to create groups and add whoever he wants just to share posts with people in that same group. <span>LiNK.ME</span> is a fast and simple social network that has the potential to become great! 

Our product can be found in the following URL: http://lbaw2145.lbaw-prod.fe.up.pt  

### 2. Video presentation

![video](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2145/-/blob/master/docs/video.png)

Our video is uploaded on the [Google folder](https://drive.google.com/drive/folders/1HDNOZ4y834m7pXgJ0XjNa_ZC26e9-Xge?usp=sharing "Videos folder").

---

## Revision history


***
GROUP2145, 11/06/2021
 
* João Miguel Gomes Gonçalves, [up201806796@fe.up.pt](mailto:up201806796@fe.up.pt)
* Nuno Filipe Ferreira de Sousa Resende, [up201806825@fe.up.pt](mailto:up201806825@fe.up.pt) 
* Pedro Miguel Pires Coelho, [up201806802@fe.up.pt](mailto:up201806802@fe.up.pt) (editor)
* Xavier Ruivo Pisco, [up201806134@fe.up.pt](mailto:up201806134@fe.up.pt)

