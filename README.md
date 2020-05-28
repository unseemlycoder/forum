# forum
Web Tech and DBMS Project
Hemant Sathish – PES2201800045
Akash Murthy – PES2201800266
Rashaad Ahmed Khan – PES2201800512
Since the introduction to modern technology, online forums have changed the industry and the way people get along with academics. The ease to find an answer or get a doubt solved has exponentially increased. It is not feasible to reach out to someone in person for all the queries one has. This is the main reason due to which the demand for such forums has increased drastically. Building an online community where like-minded people can share their views on a topic can increase the depth and intensity of a discussion. Connecting everyone who is interested in a certain topic can play a very vital role because it helps in understanding how other people approach towards the problem that you are facing.
This has been the motivation for us to build a website where students, teachers and anyone with the curiosity to know more about a topic or get their doubt solved can reach to.
We will be using HTML (Hypertext Markup Language), CSS (Cascading Style Sheets) and JavaScript for our frontend development. We will need a database to store the user credentials, posts and other forum related queries. . So, we will be using PHP and SQL for database management. A minimal usage of other technology stack is possible depending on the requirement.

This Database should be able to store admin details, user details, their posts &
replies in listed topics and threads. Admin can modify all structures, and users
can only add threads, posts, and replies.
Admin and user details to be kept separate, to protect moderator’s privacy.
Hierarchy of forum: [Topics→Thread→Post→Reply]
• Topic A
    o Thread A
        ▪ Post 1
          • Reply 1
        ▪ Post 2
        ▪ Post 3
    o Thread B
• Topic B
Database should have provisions to store user details like unique ID, name,
username, profile picture path, email, password, address, and registration
time.
Each thread, post or reply created by the user must have a unique ID
associated with it, along with details as to title, description, views, posted by,
and time of creation.
Topics can only be added and modified by admins. Details of admins not
required to be stored. Only admin login details to be stored.
