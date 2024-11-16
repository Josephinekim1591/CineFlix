# Project 3, Milestone 2: **Administrator** Design Journey

[← Table of Contents](../design-journey.md)


## Milestone 1 Feedback Revisions
> Explain what you revised in response to the Milestone 1 feedback (1-2 sentences)
> If you didn't make any revisions, explain why.

We added ten extra seed data as we were supposed to have 10 each so 20 total but only had 10. I also fixed the design sketch sidebar for the consumer and admin view all sketches to not group tags in the sidebar.


## Edit Page URL
> Design the URL for the administrator's edit page.
> What is the URL for the administrator's edit page?

/admin/movies/edit?id={movie_id}


> What query string parameters will you include in the URL?

| Query String Parameter Name       | Description       |
| --------------------------------- | ----------------- |
| id | The unique identifier for the movie record that the admin intends to edit. |


## SQL Query Plan
> Plan the SQL query to retrieve a record from one of your query string parameters.

```
SELECT id, movie_name, director, release_year, genre, rating, descript
FROM movies
WHERE id = :movie_id;

```

> Plan the SQL query to retrieve all tag names for a specific record.

```
SELECT tags.tag
FROM tags
INNER JOIN movie_tags ON tags.id = movie_tags.tag_id
WHERE movie_tags.movie_id = :movie_id;
```


## Contributors

I affirm that I am submitting my work for the administrator requirements in this milestone.

Admin Lead: Josephine Kim


[← Table of Contents](../design-journey.md)
