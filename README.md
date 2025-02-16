# Laravel Contacts CRUD Application

This is a simple **CRUD (Create, Read, Update, Delete)** application built using **Laravel** that allows users to manage their contacts. It also supports **bulk import of contacts using XML**.

---

## **Features**

✅ Create, Read, Update, and Delete Contacts\
✅ Bulk Import Contacts from XML\
✅ Laravel 11 with Vite and Vue.js\
✅ MySQL Database Support\
✅ API Endpoints for Contact Management

---

## **Installation**

### **1. Clone the Repository**

```sh
git clone https://github.com/your-repo/contacts-app.git
cd contacts-app
```

### **2. Install Dependencies**

```sh
composer install
npm install
```

### **3. Configure Environment**

- Copy `.env.example` to `.env`:
  ```sh
  cp .env.example .env
  ```
- Update database credentials in `.env`:
  ```env
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=your_database
  DB_USERNAME=your_username
  DB_PASSWORD=your_password
  ```

### **4. Generate Application Key**

```sh
php artisan key:generate
```

### **5. Run Migrations**

```sh
php artisan migrate
```

### **6. Start the Development Server**

```sh
php artisan serve
```

### **7. Run Vite for Frontend Assets**

```sh
npm run dev
```

Now visit [**http://127.0.0.1:8000**](http://127.0.0.1:8000) to see the app in action!

---

## **Folder Structure**

```
📦 contacts-app
├── 📂 app            # Laravel Application Files
├── 📂 bootstrap      # Laravel Bootstraping
├── 📂 config         # Application Configurations
├── 📂 database       # Migrations & Seeders
├── 📂 public         # Public Assets
├── 📂 resources      # Views, JS, CSS
├── 📂 routes         # Web & API Routes
├── 📂 storage        # Logs & Uploaded Files
├── 📂 tests          # Automated Tests
├── .env.example      # Example Environment File
├── package.json      # NPM Dependencies
├── vite.config.js    # Vite Configuration
└── README.md         # Project Documentation
```

---

## **Bulk Import Contacts from XML**

To bulk import contacts using an XML file, follow these steps:

### **1. Sample XML Format**

```xml
<contacts>
    <contact>
        <name>John Doe</name>
        <phone>+90 333 8859342</phone>
    </contact>
    <contact>
        <name>Jane Doe</name>
        <phone>+90 333 1563682</phone>
    </contact>
</contacts>
```

### **2. Upload XML File**

- Go to the **Import Contacts** page in the app.
- Select the XML file and upload.
- Contacts will be stored in the database.

---

## **API Endpoints**

| Method | Endpoint             | Description          |
| ------ | -------------------- | -------------------- |
| GET    | `/api/contacts`      | Get all contacts     |
| POST   | `/api/contacts`      | Create a new contact |
| GET    | `/api/contacts/{id}` | Get a single contact |
| PUT    | `/api/contacts/{id}` | Update a contact     |
| DELETE | `/api/contacts/{id}` | Delete a contact     |

---

## **Troubleshooting**

1. **Error: "Vite manifest not found"**
   - Run `npm run build` or `npm run dev`
2. **Error: "Database connection refused"**
   - Check `.env` and ensure MySQL is running.

---

## **License**

This project is licensed under the **MIT License**.

---

