Display total number of albums sold per artist
    SELECT artists.name, albums.sales FROM albums INNER JOIN artists ON albums.artist_id = artists.id;

Display combined album sales per artist
    SELECT artists.name, sum(albums.sales) as "totalsales" FROM albums INNER JOIN artists ON albums.artist_id = artists.id group by artists.name;

Display the top 1 artist who sold most combined album sales
    SELECT artists.name, sum(albums.sales) as "totalsales" 
    FROM albums 
    INNER JOIN artists ON albums.artist_id = artists.id 
    group by artists.name 
    ORDER BY sum(albums.sales)
    DESC LIMIT 1;;

Search
    SELECT albums.name
    FROM albums
    INNER JOIN artists ON albums.artist_id = artists.id 
    WHERE artists.name = 'AESPA';
