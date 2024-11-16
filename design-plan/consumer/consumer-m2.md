# Project 3, Milestone 2: **Consumer** Design Journey

[← Table of Contents](../design-journey.md)


## Milestone 1 Feedback Revisions
> Explain what you revised in response to the Milestone 1 feedback (1-2 sentences)
> If you didn't make any revisions, explain why.

I added the 10 extra seed data of movies to the "View All" page as well, because the requirement was 10 seeds per person (20 total), but we only had 10 total. We also edited the View All sketches so that the tags are not grouped.


## Details Page URL
> Design the URL for the consumer's detail page.
> What is the URL for the detail page?

/movie-details?id={movie_id}

> What query string parameters will you include in the URL?

| Query String Parameter Name       | Description       |
| --------------------------------- | ----------------- |
| id                                | This is the unique identifier used to pass the movie's ID value to the /movie-details page.|


## SQL Query Plan
> Plan the SQL query to retrieve a record from one of your query string parameters.

```
SELECT
      id,
      movie_name,
      director,
      release_year,
      genre,
      rating,
      descript
FROM movies
WHERE id = :movie_id;

```

> Plan the SQL query to retrieve all tag names for a specific record.

```
SELECT tags.tag
FROM tags
INNER JOIN movie_tags ON tags.id = movie_tags.tag_id
WHERE movie_tags.movie_id = :id;
```


## Contributors

I affirm that I am submitting my work for the consumer requirements in this milestone.

Consumer Lead: Tiffany Quen


[← Table of Contents](../design-journey.md)
