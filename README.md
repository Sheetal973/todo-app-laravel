# To-Do App (Laravel)

A simple and clean To-Do list application built using **Laravel 11** and **Bootstrap 5**.  
It supports adding tasks, editing, deleting, filtering, search with delay input, and marking tasks as completed.

---

## Features

- Add, edit, update and delete tasks  
- Mark tasks as **completed / pending**  
- Light-green highlight for completed tasks  
- Auto-search with delay (0.5 sec debounce)  
- Validation & success/error messages  
- Responsive UI with Bootstrap 5  

---

## Tech Stack

| Layer | Technology |
|-------|-------------|
| Backend | Laravel 11 |
| Frontend | Blade, Bootstrap 5, FontAwesome |
| Database | MySQL |
| Version Control | Git & GitHub |

---

## Project Structure

```
app/
resources/
routes/
database/
public/
```

---

## How to Run This Project

### **1. Clone Repository**
```
git clone https://github.com/Sheetal973/todo-app-laravel.git
```

### **2. Install Dependencies**
```
cd todo-app-laravel
composer install
npm install
```

### **3. Environment Setup**
```
cp .env.example .env
```

Update DB section in `.env`:
```
DB_DATABASE=your_db_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### **4. Generate Key**
```
php artisan key:generate
```

### **5. Import Database**
This project requires a MySQL database.

1. Create a database (example: `todo_app`)
2. Import the SQL file provided: `todo.sql`

### **6. Run Migrations (if required)**
```
php artisan migrate
```

### **7. Start Server**
```
php artisan serve
```

Open:  
👉 http://127.0.0.1:8000/
---

## 👩‍💻 Developer  
**Sheetal Jaiswal**  
PHP Laravel Developer  
GitHub: https://github.com/Sheetal973

<img width="1894" height="951" alt="image" src="https://github.com/user-attachments/assets/24b0fe61-dfe2-444c-aacf-77129c92953a" />
