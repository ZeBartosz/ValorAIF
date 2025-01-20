# ZePatches

ValorAIF is a lively, forum-style platform tailored for the Valorant community. It includes an intuitive like/dislike system, a dynamic comment section, and a comprehensive search function to facilitate user connection and engagement. The admin panel provides powerful tools for community management, enabling administrators to promote or demote users, as well as edit or delete posts and user accounts.
## Features

- **Post Creation:** Users can create new posts on various topics related to Valorant.
- **Post Management:** Posts can be deleted and liked by users.
- **Comments:** Users can comment on posts to join the conversation.
- **User Interaction:** Like posts and comments to show appreciation for others' contributions.
- **Real-time Notifications:** Get notified in real-time about new posts, comments, and likes.

## Technologies Used

- **Backend:** Laravel
- **Frontend:** React with Inertia.js
- **Styling:** Tailwind CSS with the motion plugin

## Installation

Follow these steps to get the project up and running locally:

1. Clone the repository:
   ```bash
   git clone https://github.com/ZeBartosz/ZePatches.git
   cd ZePatches
   ```

2. Install dependencies:
   ```bash
   composer install
   npm install
   ```

3. Copy the environment configuration file:
   ```bash
   cp .env.example .env
   ```

4. Configure your `.env` file:
   - Set up your database credentials.
   - Add your Steam API key.
   - Configure the WebSocket broadcaster (Reverb).

5. Run the migrations:
   ```bash
   php artisan migrate
   ```

6. Start the development servers:
   ```bash
   php artisan serve
   npm run dev
   ```
   or
    ```bash
   composer run dev
   ```
   

## Usage

1. Open the application in your browser (default: `http://localhost:8000`).
2. Register an account.
3. Browse through the forum and explore posts.
4. Like posts and interact with the community!

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request.

1. Fork the repository.
2. Create a new branch for your feature or bugfix:
   ```bash
   git checkout -b feature-name
   ```
3. Commit your changes:
   ```bash
   git commit -m "Description of changes"
   ```
4. Push to your fork:
   ```bash
   git push origin feature-name
   ```
5. Submit a pull request.

## License

This project is licensed under the MIT License.

## Contact

Feel free to reach out for any questions or feedback:
- **GitHub:** [ZeBartosz](https://github.com/ZeBartosz)

## Screenshots
- Homescreen
![Homescreen](https://i.imgur.com/YIZ4lOI.png)
- Search View
![Search View](https://i.imgur.com/xgT5hst.png)
- Patch View
![Patch View](https://i.imgur.com/2ALlnhA.png)
- Admin Dashboard
![Notification View](https://i.imgur.com/uClA6Ef.png)
