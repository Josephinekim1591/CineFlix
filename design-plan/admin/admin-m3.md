# Project 3, Milestone 3: **Administrator** Design Journey

[← Table of Contents](../design-journey.md)


## Milestone 2 Feedback Revisions
> Explain what you individually revised in response to the Milestone 1 feedback (1-2 sentences)
> If you didn't make any revisions, explain why.

I edited the code to make the whole card clickable and I also made sure the entry data would displayed on edit page.


## Edit Form - UPDATE query
> Plan your query to update an entry in your catalog.

```sql
UPDATE movies
SET movie_name = :movie_name, director = :director, release_year = :release_year, rating = :rating, genre = :genre, descript = :descript, file_ext = :file_ext
WHERE id = :id;
```


## Edit Form - Sample Test Data
> Document sample test data to edit an entry in your catalog.
> Upload a sample file to the `design-plan/admin` folder for us to upload when editing the entry.

**Sample Edit Data:**
  - Movie Name: Inception
  - Director: Christopher Nolan
  - Release Year: 2010
  - Rating: PG-13
  - Genre: Sci-Fi, Thriller
  - Description: A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a CEO.

**Sample Upload File:** `design-plan/admin/inception(final).jpg`


## Contributors

I affirm that I am submitting my work for the administrator requirements in this milestone.

Admin Lead: Josephine Kim


[← Table of Contents](../design-journey.md)
