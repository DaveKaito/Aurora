# **Project Aurora**

### Marc Ruckstuhl WBD 318

### Database Design

##### I decided to make 2 Databases for my Project, one for the users and one for the Blog entries.

##### Users

##### `id` int(11) NOT NULL,

##### `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,

##### `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,

##### `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,

##### `is_admin` tinyint(1) NOT NULL,

##### `is_user` tinyint(1) NOT NULL

| "id" | "username"   | "email"               | "password"                                                       | "is_admin" | "is_user" |
| ---- | ------------ | --------------------- | ---------------------------------------------------------------- | ---------- | --------- |
| "28" | "admin"      | "admin@admin\.com"    | "$2y$10\$dldxCvGpW3iaCL6oaPwuPeWOD06Ps40UhYI8pG7RpJxfza4wEilNO"  | "1"        | "0"       |
| "43" | "mruckstuhl" | "ophustle@gmail\.com" | "$2y$10\$fyHKEEJt5J/f9ctXHAnBqu9/zxxRqydTuKO\.0rtaldG6IcQ81b2Qe" | "0"        | "1"       |

##### This is essentially a generic table. is_admin can only be changed in the db itself and there is only one admin. The user int gets assigned as soon as someone registers. With this the user can log in an access all the features.

| "id"  | "title"    | "creator" | "date"                | "bdesc" | "tag"         | "imglink"                                                                                         |
| ----- | ---------- | --------- | --------------------- | ------- | ------------- | ------------------------------------------------------------------------------------------------- |
| "144" | "About_Me" | "asdf"    | "Sun\-06\-2019 23:10" | "asdf"  | "Photography" | "https://horizon\-media\.s3\-eu\-west\-1\.amazonaws\.com/s3fs\-public/field/image/ecosystem\.jpg" |
