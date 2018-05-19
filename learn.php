<!-- head here  -->
<?php
include_once("header.php");
?>
<!-- head ends -->

<style>
    /* card */
    .learn-card {
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        height: auto;
        margin: 2em 0em;
    }
    .learn-icon {
        background: #E1E1E1;
        border: none;
        flex: 1 1 20%;
        cursor: pointer;
        display: flex;
        justify-content: center;
        padding: 1em;
    }
    .learn-icon:hover {
        background: #48BBFC;
    }
    .learn-desc {
        border: 1px solid #E1E1E1;
        flex: 1 1 60%;
        padding: 0.4em 1em;
    }
    .learn-desc p {
        margin: 5px 0;
    }
    .learn-desc a {
        font-size: 0.6em;
        color: #48BBFC;
        text-decoration: underline;
    }
    .title {
        font-weight: 600;
        font-size: 0.7em;
    }
    .brief {
        font-size: 0.6em;
    }
    /* media queries */
    @media (min-width: 900px) {
        .learn-card {
            flex-direction: row;
        }
    }
    /* .align{
        text-align:center;
        width: 800px ;
        margin-left: auto ;
        margin-right: auto ;
    } */
</style>

<div class="container">
    <div class="align"> 
       <div class="row justify-content-md-center text-center">
       	<div class="col"></div>
        <div class="col-8" style="margin-top: 1em;">
            <h1 class="sponsorsbg-text pt-5 text-center hero-text">What Interns Learn</h1>
            <hr class="under-line">
            <span>
                In HNG 4.0, Interns get to learn important concepts quickly, they are introduced to
                complex programming frameworks alongside important collaborative tools.
            </span>
        </div>
        <div class="col"></div>

        </div>
    </div>
</div>

<!-- <hr> -->
<!-- courses -->

    <div class="row justify-content-md-center">
        <div class="col"></div>
        <div class="col-8">
            <div class="learn-card">
                <div class="learn-icon">
                    <img alt="learn-icon" src="svg/learn-1.svg">
                </div>
                <div class="learn-desc">
                    <p>
                        <span class="title">
                            Principles of Product Design (UI/UX)
                        </span><br>
                        <span class="brief">
                        Introducing you to a world of interface design with real-time collaboration using figma.
                        First of it's kind, Figma enables teams carry outprojects in one page,
                        while keeping all feedback changes and updates constantly in sync.
                        </span>
                    </p>

                    <p>
                        <span class="title">
                        An Introduction to User Experience Design
                        </span><br>
                        <span class="brief">
                        <a href="https://hackdesign.org/" style="font-size:1em;">See Learning Resources <i class="fa fa-chevron-right"></i></a>                        User Experience Design Resources - Prototype blog.prototypr.io/user...
                        </span>
                    </p>
                </div>
            </div>
            <div class="learn-card">
                <div class="learn-icon">
                    <img alt="learn-icon" src="svg/learn-2.svg">
                </div>
                <div class="learn-desc">
                    <p>
                        <span class="title">
                        Front-End Development (HTML/CSS/SASS/Vue)
                        </span><br>
                        <span class="brief">
                        Front-end web development is the practice of converting data to graphical
                            interface for user to view and interact with data through digital interaction using HTML,
                            CSS and Javascript.
                        </span>
                    </p>
                </div>
            </div>
            <div class="learn-card">
                <div class="learn-icon">
                    <img alt="learn-icon" src="svg/learn-3.svg">
                </div>
                <div class="learn-desc">
                    <p>
                        <span class="title">
                        Back-End Development (PHP/Laravel)
                        </span><br>
                        <span class="brief">
                        The backend of a web application is an enabler for a frontend experience. ...
                        Backend code is run on the server, as opposed to the client.
                            This means that backend developers not only need to understand programming languages
                            and databases, but they must have an understanding of server architecture as well.
                        </span>
                    </p>
                </div>
            </div>
            <div class="learn-card">
                <div class="learn-icon">
                    <img alt="learn-icon" src="svg/learn-4.svg">
                </div>
                <div class="learn-desc">
                    <p>
                        <span class="title">
                        Dev-Ops (Ubuntu, Nginx, Docker)
                        </span><br>
                        <span class="brief">
                        Apply DevOps in your team; Understand Continuous Delivery; Automate the Software Development
                            Lifecycle (SDLC); Automate the deployment process; Reduce release time; Release better software;
                            Build a highly available and fully scalable application; Deploy microservices using Docker and
                            Kubernetes.
                        </span>
                    </p>
                </div>
            </div>
            <div class="learn-card">
                <div class="learn-icon">
                    <img alt="learn-icon" src="svg/learn-5.svg">
                </div>
                <div class="learn-desc">
                    <p>
                        <span class="title">
                        Databases(MySQL)
                        </span><br>
                        <span class="brief">
                         MySQL is a database system used on the web.
                        MySQL is a database system that runs on a server.
                        MySQL is ideal for both small and large applications.
                        MySQL is very fast, reliable, and easy to use.
                        MySQL uses standard SQL.
                        MySQL compiles on a number of platforms.
                        </span>
                    </p>
                </div>
            </div>
            <div class="learn-card">
                <div class="learn-icon">
                    <img alt="learn-icon" src="svg/learn-6.svg">
                </div>
                <div class="learn-desc">
                    <p>
                        <span class="title">
                        Version Control (GIT)
                        </span><br>
                        <span class="brief">
                        GitHub is a development platform inspired by the way you work.
                            From open source to business, you can host and review code, manage projects,
                            and build software alongside millions of other developers.
                        </span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
</div>

<!-- Footer -->
<?php
include_once("footer.php");
?>
