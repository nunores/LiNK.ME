# LiNK.ME

![LiNK.ME short demonstration](./docs/lbawgif.gif)  

LiNK.ME is a social networking web application that blends features inspired by Twitter and Facebook, offering users a clean and interactive experience to connect, share, and engage with each other. Built with **Laravel** and **PostgreSQL** and containerized using **Docker**, it operates on a **RESTful API** architecture, supporting full CRUD operations for posts and comments, user following, search, notifications, and more. 

The project emphasized learning development methodologies, including managing user stories, gathering requirements, and designing wireframes.

## Features
- 👤 User Authentication
- 📝 Create & Edit Posts
- 💬 Comment System
- 👍 Likes & Reactions
- 🔍 Search Functionality
- 🧑‍🤝‍🧑 Follow/Unfollow Users
- 🛎️ Notifications System
- 📱 Responsive Design
- 🐳 Dockerized Environment

## Tech Stack
- **Backend**: Laravel 10, PHP
- **Frontend**: Blade (Laravel templating), HTML, CSS, JavaScript
- **Database**: PostgreSQL
- **Containerization**: Docker
- **Authentication**: Laravel Auth

## Usage
1. Register an account and log in.
2. Create and interact with posts.
3. Follow users and receive notifications.
4. Explore trending content via the homepage.

## Getting Started

These instructions will help you set up the project on your local machine using Docker.

### Prerequisites

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)

```bash
git clone https://github.com/nunores/LiNK.ME.git
cd LiNK.ME
docker run -it -p 8000:80 -e DB_DATABASE="lbaw2145" -e DB_USERNAME="lbaw2145" -e DB_PASSWORD="IK904155" lbaw2145/lbaw2145 
```

### URL

http://lbaw2145.lbaw-prod.fe.up.pt/

## Contributors

This project was developed as part of the [LBAW](https://sigarra.up.pt/feup/pt/ucurr_geral.ficha_uc_view?pv_ocorrencia_id=350472) course at [FEUP](https://fe.up.pt).

| Name                | GitHub Username                                 | 
|---------------------|--------------------------------------------------|
| Nuno Resende          | [@nunores](https://github.com/nunores)           
| João Gonçalves        | [@joao0903](https://github.com/joao0903)   |
| Xavier Pisco      | [@Xavier-Pisco](https://github.com/Xavier-Pisco)         |
| Pedro Coelho       | [@Mine4Phantom](https://github.com/Mine4Phantom)           | 

## License
This project is licensed under the **MIT License**.
