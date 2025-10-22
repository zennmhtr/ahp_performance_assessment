## AHP Performance Assesment
AHP Performance Assesment is a website designed to provide a decision support system using the AHP (Analytic Hierarchy Process) method. This site enables users to analyze various decision alternatives based on defined criteria, assisting in determining the best choice in a systematic and transparent way. With a user-friendly interface, users can easily input data and obtain in-depth analysis results to support more accurate decision-making.

## Framework & Languange
- **Laravel 9** --> **Laravel 12**
- **Laravel Breeze**
- **PHP 8.2**
- **MySQL Database**
- **TailwindCSS**
- **daisyUI**
- **[maatwebsite/excel](https://laravel-excel.com/)**
- **[barryvdh/laravel-dompdf](https://github.com/barryvdh/laravel-dompdf)**

## Features

- Main features available in this application:
  - Implementation AHP method
  - Import data --> example [Alternatif](https://github.com/user-attachments/files/23052105/Import.Alternatif.xlsx), [Kategori](https://github.com/user-attachments/files/23052107/Import.Kategori.xlsx), [Kriteria](https://github.com/user-attachments/files/23052106/Import.Kriteria.xlsx)
    
## Installation
Follow the steps below to clone and run the project in your local environment:
1. Clone repository:

    ```bash
    https://github.com/zennmhtr/ahp_performance_assessment.git
    ```

2. Install dependencies use Composer and NPM:
    ```bash
    - composer install
    - composer update
    - npm install
    - npm update
    ```

3. Copy file `.env.example` to `.env`:

    ```bash
    cp .env.example .env
    ```

4. Generate application key:

    ```bash
    php artisan key:generate
    ```

5. Setup database in the `.env` file:

    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=spk-atl
    DB_USERNAME=root
    DB_PASSWORD=
    ```

6. Run migration database:

    ```bash
    php artisan migrate
    ```

7. Run seeder database:

    ```bash
    php artisan db:seed
    ```

8. Run website:

    ```bash
    npm run dev
    php artisan serve
    ```

## Screenshot
- ### **Dashboard**

<img src="https://github.com/user-attachments/assets/adeaedef-a977-4309-a542-510e4c2dcbab" alt="Halaman Dashboard" width="" />
<br><br>

- ### **Criteria Page**

<img src="https://github.com/user-attachments/assets/05d065bd-eb8b-43cc-b743-91bccb7b0b3a" alt="Halaman Kriteria" width="" />
<br><br>

- ### **AHP Method Page**

<img src="https://github.com/user-attachments/assets/e546f0eb-2c9b-4dae-a2df-2d1f342bc020" alt="Halaman Metode AHP" width="" />
<br><br>

- ### **Result Page**

<img src="https://github.com/user-attachments/assets/db40f871-861c-4a40-bf23-f1cd226b2093" alt="Halaman Hasil Akhir" width="" />
<br><br>
