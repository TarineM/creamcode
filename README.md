# creamcode

The main project is to know more of cosmetic products by their ingredients and show some alternatives

Here there are Back (with Models, Repository, FileSystem and BDD)
and Front (template and integration)

I use some principles like :
- POO: Entity models are objects with properties
- SOLID: each controller has their actions, and some files have interface or abstract class
- MVC: Back (Models and Controller) and Front (View)


Back:
- Controllers --> gestion view and models
- FileSystem --> Folder and Image (some entities need)
- Models --> entities and its repository
- Security --> check form in controllers, it's act like Validator
- Application is to run the site through default page
- Http & Render --> display content page and redirection

Front:
- Admin --> to manage brands, ingredients, labels, products, blog ...
- Client --> get products by search and read blog
- Shared --> some template are used in admin and client
- Integration --> CSS, javascript (and bootstrap)
