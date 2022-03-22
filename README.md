<div id="top"></div>
<br />

<!-- PROJECT INTRO -->
<div align="center">
<h1 align="center">LaravelAPI</h1>
Built this api for user management protected by api token
</div>

<h2 id="installation">Installation</h2>

<strong>Configure your .env file</strong> <br>

Go to the root folder of your project and run the following command<br>

```
./vendor/bin/sail up
```

<h3 id="composerInstall">Composer Install</h3>

Run the following command:

```
./vendor/bin/sail composer install
```

<h3 id="migrations">Migrations</h3>

Run the following command:
```
./vendor/bin/sail artisan migrate
```

<h3 id="tests">TESTS</h3>

Run the following command:

```
./vendor/bin/sail artisan test
```
----------------------------------------
<h2>API Endpoints</h2>

<h3>Get Token</h3>

<h4>Create new user</h4>
```
POST - http://127.0.0.1:8000/api/user
Header: Authorization: Bearer (token)
Body object:
{
"name": "Firstname Lastname",
"email": "firstname.lastname@clicko.com",
"password": "password_pwd"
}
```

<strong>Copy the token that this call returns and send it in the header of the following requests</strong>

<h3>Update user</h3>
```
PUT - http://127.0.0.1:8000/api/user/{id}
Header: Authorization: Bearer (token)
Body object:
{
"name": "Name Surname",
"email": "name.surname@email.com"
}
```

<h3>Get user</h3>
```
GET - http://127.0.0.1:8000/api/user/{id}
Header: Authorization: Bearer (token)
```

<h3>Delete user</h3>
```
DELETE - http://127.0.0.1:8000/api/user/{id}
Header: Authorization: Bearer (token)
```

<h3>Delete user</h3>
```
DELETE - http://127.0.0.1:8000/api/user/{id}
Header: Authorization: Bearer (token)
```

<h3>Get Most Used Domains</h3>
```
GET - http://127.0.0.1:8000/api/user/most-used-domains
Header: Authorization: Bearer (token)
```

