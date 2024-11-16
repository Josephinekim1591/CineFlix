# Project 3, Milestone 3: **Team** Design Journey

[← Table of Contents](design-journey.md)

**Make the case for your decisions using concepts from class, as well as other design principles, theories, examples, and cases from outside of class (includes the design prerequisite for this course).**

You can use bullet points and lists, or full paragraphs, or a combo, whichever is appropriate. The writing should be solid draft quality.


## Milestone 2 Team Feedback Revisions
> Explain what your **team** collectively revised in response to the Milestone 2 feedback (1-2 sentences)
> If you didn't make any revisions, explain why.

We didn't make any revisions as a team because Tiffany used a slip day and did not receive her feedback and there was only an issue with the consumer side of the website. Josephine edited her admin code to make the whole card clickable and she also made sure the entry data would displayed on edit page.



## File Upload - Types of Files
> What types of files will you allow users to upload?
> Can users upload any type of file? Can user only upload one type of file?
> Or can users upload several different types of files?
> List the file extensions of the types of files your users may upload.

- We will allow users to upload image type files only of the movie poster. The only type of file extensions that the user may upload is an image in: .jpg.


## File Upload - Updated DB Schema
> Plan any updates you need to make to your database schema to support file uploads.
>
> 1. Copy your Project 3 DB Schema for the _entries_ table here.
> 2. Modify the schema to include any file upload information you desire to store in your database.
>    If you don't need to modify anything, explain why.

**Table:** movie

- id: INTEGER {PK, U, NN, AI},
- movie_poster: TEXT {NN},
- movie_name: TEXT {NN},
- director: TEXT {NN},
- release_year: INTEGER {NN},
- rating: INTEGER {NN},
- genre: TEXT {NN},
- descript: TEXT {NN}

```
- id: INTEGER {PK, U, NN, AI},
- file_ext TEXT NOT {NN},
- movie_name: TEXT {NN},
- director: TEXT {NN},
- release_year: INTEGER {NN},
- rating: REAL {NN},
- genre: TEXT {NN},
- descript: TEXT {NN},
```


## File Upload - File Storage
> Plan the file path to store the uploaded files on the server's file system.
> Store the uploaded files in a subfolder of the `public/uploads` folder using the entries table name as the subfolder name.

public/uploads/movie/idfile_ext



## File Upload - Path and URL
> Assume that a user completed the insert/edit entry form.
> The **id** for the new record is **154**.
>
> 1. Plan the file system path to store the uploaded file.
> 2. Plan the URL to load the uploaded file in your website's HTML.

**File System Storage Path:**

```
public/uploads/movie/154.jpg
```

**Resource URL:**

```
<picture>
  <img src="/public/uploads/movie/154.jpg">
</picture>
```


## File Upload - Form Input
> Write the HTML of an `<input>` element that allows users to upload a file.

```html
<input type="file"
       name="file-name"/>
```


## File Upload - PHP File Upload Data
> Use the `name` attribute of the file input you planned above to plan how you will
> access the uploaded file data in PHP using the `$_FILES` superglobal.
> Write the PHP code to access the uploaded file data from the `$_FILES` superglobal.
> Only include the data you will extract from the `$_FILES` superglobal. For example, the file name.
> Hint: <https://www.php.net/manual/en/features.file-upload.post-method.php>

```
$_FILES[file-upload][type]
```


## Filtering by a Tag - Query String Parameters
> Plan the query string for filtering by a tag for the "view all" pages.
> (This plan should be exactly the same for both the consumer and admin views.)
> Include the query string parameter and its value.
> Document the value with the field from your database in all CAPITOL letters.

Example: `?category=ID` where `ID` is the `id` field from the `categories` table.

?tags=TAG_ID


## Filtering by a Tag - SQL Query Plan
> Plan the SQL query to retrieve all entries with a specific tag using the query string parameter.

```
SELECT movie.*
FROM movie
INNER JOIN movie_tags ON movie.id = movie_tags.movie_id
INNER JOIN tags ON movie_tags.tag_id = tags.id
WHERE tags.id = :id;
```


## Contributors

I affirm that I have contributed to the team requirements for this milestone.

Consumer Lead: Tiffany Quen

Admin Lead: Josephine Kim


[← Table of Contents](design-journey.md)
