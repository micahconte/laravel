@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">

                                    <div data-role="page" class="page" id="next">
                                        <div data-role="header" data-position="fixed">
                                            <hr>
                                                <div class="col-md-3 col-md-offset-4">
                                                    <h2 style="font-family:roboto;display:inline">Cover Letter</h2>
                                                </div>
                                                <div class="col-md-1 col-md-offset-3">
                                                    <a href="{{ url('/cover_letter') }}" class="btn btn-info active">Download</a>
                                                </div>
                                                <br>
                                            <hr>
                                        </div>

                                        <div class="ui-content" role="main">
                                            <p>To whom it may concern,</p>
                                            <br>

                                            <p>
                                                My goal is to work with a company where I can keep learning and developing my 
                                                programming skills as well as keep up with new and exciting technologies. 
                                                I have a broad range of experience with PHP, MySQL, HTML, CSS and Javascript as well as 
                                                with other tools like Python and Java. I have programmed in Laravel, ZEND, 
                                                and Django frameworks as well some javascript frameworks like React and Angular.
                                            </p>
                                            <p>
                                                I feel I can be a good team-player as well as a leader. I am an easy-going 
                                                person, yet very meticulous about my work. I like to take ownership of and 
                                                follow through the complete life-cycle of projects.
                                            </p> 
                                            <p>
                                                Please review my resume and feel free to contact me by the number below with any 
                                                questions.
                                            </p> 
                                            <br>

                                            <p>
                                                Thank You,<br>  
                                                Micah Conte<br>
                                                239.207.8036<br>
                                                micahconte@hotmail.com<br>
                                                <br>
                                            </p>
                                        </div>
                                    </div>


                                    <div data-role="page" class="page" id="end">
                                        <div data-role="header" data-position="fixed">
                                            <hr>
                                                <div class="col-md-1 col-md-offset-4">
                                                    <h2 style="font-family:roboto;display:inline">Resume</h2>
                                                </div>
                                                <div class="col-md-1 col-md-offset-5">
                                                    <a href="{{ url('/resume') }}" class="btn btn-info active">Download</a>
                                                </div>
                                                <br>
                                            <hr>
                                        </div>

                                        <div class="ui-content" role="main">
                                            <br>

                                            <p>
                                            Dec ‘15 – May '16  VanDePoel Prod. – Orange County, CA (PHP Developer) – Contract Remote<br>
                                            Developed company websites and applications in PHP in Laravel framework<br>
                                            </p>

                                            <ul>
                                            <li>Used HTML, CSS, LESS, and Bootstrap for UI style and design</li>
                                            <li>Used Laravel MVC framework for lead-retrieval, QR, and BlinQ web applications.</li>
                                            <li>Created database migrations for easy management</li>
                                            <li>Used MySQL backend </li>
                                            <li>Created QR codes for event attendee badges</li>
                                            <li>Worked with NoSql (Redis) database</li>
                                            <li>Used composer and artisan for Laravel app setup</li>
                                            <li>PHPUnit testing for process isolation tests and failures</li>
                                            <li>iOS development environment with Sublime</li>
                                            <li>Virtual hosting for multiple domain management</li>
                                            <li>GIT and BitBucket for version control and branching</li>
                                            <li>Jira ticketing for issue management and tracking</li>
                                            <li>Skype, Join-Me and TeamViewer for remote team interactions</li>
                                            </ul>
                                            </p>
                                            <br>

                                            <p>
                                            Aug ’15 – Dec ‘15  Asset-Map – Philadelphia, PA (Python Developer) - Contract<br>
                                            Developed company website applications in Python in Django framework<br>
                                            <ul>
                                            <li>Used HTML and CSS, LESS for UI style and design</li>
                                            <li>Developed in a MAC environment</li>
                                            <li>PostgreSQL database </li>
                                            <li>Python Django MVC development</li>
                                            <li>Javascript with Backbone.js and jQuery in app UI development </li>
                                            <li>Used Sublime and Firebug for coding and debugging</li>
                                            <li>Used GIT for version control and branch management</li>
                                            <li>Consulted with the business to adapt software to company specifications</li>
                                            <li>Application unit testing and debugging for quality assurance as well as speed testing</li>
                                            <li>REST API calls with Python for AWS bucket data access</li>
                                            <li>Managed Development and Production code-base for smooth code fix and update deployment</li>
                                            </ul>
                                            </p>
                                            <br>

                                            <p>
                                                November ’14 – June ‘15  International Rectifier – Temecula, CA (Software Developer) - Contract<br>
                                            Developed company website applications in PHP scripting and object-orientated coding structure<br>
                                            <ul>
                                            <li>Used HTML and CSS for UI style and design</li>
                                            <li>Developed in a Windows environment</li>
                                            <li>Created Windows Tasks and cron jobs for automated scripts and triggers</li>
                                            <li>MS SQL development and PHP back-end programming</li>
                                            <li>Javascript with jQuery framework in app UI development</li>
                                            <li>Used phpMyAdmin for database admin, stored procedures, and db optimizations and maintenance </li>
                                            <li>Used Sublime for coding and debugging</li>
                                            <li>Used TortoiseSVN for version control and branch management</li>
                                            <li>Consulted with users to adapt software to company specifications</li>
                                            <li>Application unit testing and debugging for quality assurance as well as speed testing</li>
                                            <li>Managed Development and Production code-base for smooth code fix and update deployment</li>
                                            </ul>
                                            </p>
                                            <br>
                                            

                                            <p>
                                                August '13 to August ‘14  iSpot.com – Concord, CA (PHP Developer) - Contract<br>
                                            Purely remote position as a full-lifecycle PHP application developer<br>
                                            <ul>
                                            <li>Worked and developed in a MAC environment</li>
                                            <li>Developed PHP application, adapting cookie-cutter Tonic framework for each individual pharmaceutical research company specs</li>
                                            <li>Worked with a team of developers, designers, DBAs as well as with Business Analysts Application UI developing with PHP, MySQL and Oracle</li>
                                            <li>Developed web application with ZEND and Tonic PHP frameworks </li>
                                            <li>Used Authorize.net API for payment gateway and validation</li>
                                            <li>Used phpMyAdmin for database optimization, Sublime for coding and debugging, TortoiseSVN for branching and version control, Cornerstone for FTP access, Firebug for UI testing, Git for version control within a team environment</li>
                                            <li>Consulted with customers to adapt software to company specifications</li>
                                            <li>Preformed unit testing, debugging for quality assurance</li>
                                            </ul>
                                            </p>
                                            <br>
                                            

                                            <p>
                                                Nov '11 to July '13  Auction.com – Irvine, CA (Senior PHP Developer) - Contract<br>
                                            Worked with a team of developers, designers, DB admins, DBAs in full-lifecycle software engineering and UI design<br>
                                            <ul>
                                            <li>Worked in a Windows environment</li>
                                            <li>Application engineering with PHP scripting and object-oriented coding, Java, Python, MySQL, Oracle, and Apache Converted PHP Auction legacy code to proprietary PHP framework with MySQL db and Oracle DB </li>
                                            <li>Preformed Java application development and testing</li>
                                            <li>Developed Java plug-in applications accessing Oracle DB</li>
                                            <li>Developed Auction application using Python with the Bottle framework </li>
                                            <li>Front-end web development with HTML, CSS, Javascript and jQuery Developed Auction Watchlist in jQuery using a SlickGrid library</li>
                                            <li>Use of design packages .Less and twitter bootstrap for customer UI development</li>
                                            <li>Worked with proprietary framework, as well as integrating Zend MVC framework </li>Used phpMyAdmin db, Jira ticketing system, Sublime coding and testing, Eclipse, TortoiseSVN, Firebug, Git </li>
                                            <li>Used Google Analytics for website SEO and user behavior tracking</li>
                                            <li>Unit testing, debugging and Quality Assurance for software development for high-volume traffic</li>
                                            </ul>
                                            </p>
                                            <br>
                                            
                                             
                                            <p>
                                                Feb '11 to Nov '11  Independent Web Contractor<br>
                                            Server-side application developing with PHP, MySQL and Apache LAMP<br>
                                            <ul>
                                            <li>Developed in an MAC environment</li>
                                            <li>Front-end web development with HTML, CSS, Javascript and jQuery</li>
                                            <li>User Interface and workflow website design </li>
                                            <li>Created proprietary back-end user admin applications</li>
                                            <li>Used phpMyAdmin, Eclipse, SVN, X-Debug, Firebug</li>
                                            <li>Used Paypal and Authorize.net APIs as payment and validation gateways</li>
                                            <li>Testing, debugging and Quality Assurance</li>
                                            <li>Amazon Web Services for image and video storage</li>
                                            </ul>
                                            </p>
                                            <br>
                                            
                                             
                                            <p>
                                                Oct ’10 to Feb ’11 Harvard Law School - Cambridge, MA (PHP Developer) - Contract<br>
                                            Application and web development in a LAMP setting<br>
                                            <ul>
                                            <li>Developed company web applications UI with Ajax, jQuery, Javascript and CSS </li>
                                            <li>Created back-end user admin application as well as front-end user interface for staff and student data management</li>
                                            <li>Used phpMyAdmin db management, Eclipse coding environment, SVN version control, X-Debug and Firebug for debugging and QA</li>
                                            <li>Consulted with faculty and students for UI specifications</li>
                                            </ul>
                                            </p>
                                            <br>
                                            

                                            <p>
                                                Nov ’09 to Jul ’10  Banyan Technology Group - Naples, FL (Web Developer) – Full-Time<br>
                                            Full-cycle design and development of websites for local businesses using PHP, MySQL, Apache, Ajax jQuery, Javascript and CSS within a LAMP setting. Partial remote web development work in a MAC environment<br>
                                            <ul>
                                            <li>Consulted with customer base to adapt website UI and functionality to user and admin specifications</li>
                                            <li>Created back-end user admin for sites for proprietary CMS functionality</li>
                                            <li>Implemented HTML5 for more interactive UI and precise user input. </li>
                                            <li>Used common SEO techniques for better search engine placement Incorporated PHP OOP in development for more structured and reusable code</li>
                                            <li>Implementation and optimization of MySQL Data Server</li>
                                            <li>Implemented Virtual Merchant and Google .Net APIs Gateways and SSL encryption for e-commerce Merchant sites</li>
                                            <li>Used phpMyAdmin, Eclipse, SVN, X-Debug, Firebug</li>
                                            <li>Application and website testing, debugging and Quality Assurance</li>
                                            </ul>
                                            </p>
                                            <br>
                                            

                                            <p>
                                                Jun ’09 to Nov ’09     Cron Systems - Punta Gorda, FL. (Software Developer) - Contract<br>
                                            Start to end software development with PHP, MySQL, Javascript, CSS, Ajax and jQuery within a LAMP environment. Fully remote PHP application development position in a Windows environment <br>
                                            <ul>
                                            <li>Created proprietary back-end user admin for sites to add CMS functionality </li>
                                            <li>Work remotely within a team of designers, developers and programmers in project scope management  Eclipse, SVN, X-Debug and phpMyAdmin for development tools</li>
                                            <li>Created and processed XML files for data transfer and processing  .Net API </li>Gateway integration and SSL encryption for Merchant e-commerce sites using Authorize.net</li>
                                            <li>Software testing, debugging and Quality Assurance </li>
                                            <li>Java application development and trouble-shooting</li>
                                            <li>Data storage and data encryption</li>
                                            </ul>
                                            </p>
                                            <br>
                                            

                                            <p>
                                                May ’07 to May ’09      Administrative Claim Service - Winchester, MA  (Developer) – Full-Time<br>
                                            Worked remotely and on-site with a team of programmers and DBAs<br>
                                            <ul>
                                            <li>Company website programming and development with user admin back-end functionality  Use of PHP, HTML, CSS, Ajax, jQuery and Javascript as well as some ASP web technologies to develop company website</li>
                                            <li>Converted company site from ASP to PHP</li>
                                            <li>Implementation and optimization of MySQL Data Server  MVC development using Zend framework </li>
                                            <li>Incorporated PHP OO programming in development for more structured, reusable and secure code</li>
                                            <li>Paypal .Net API integration and SSL encryption for e-commerce sites </li>
                                            <li>Setup and use of MySQL database with Apache server </li>
                                            <li>Tortoise SVN for version control and phpDesigner for SDK </li>
                                            <li>Used Firebug and X-Debug for testing, debugging, and Quality Assurance</li>
                                            <li>Asterisk telecom setup</li>
                                            </ul>
                                            </p>
                                            <br>

                                              
                                            <p>
                                                Education 
                                            <ul>
                                            <li>Associates Degree in Computer Science - Programming
                                            Northern Essex - Dec 2008</li>
                                            </ul>
                                            </p>
                                        
                                        </div>
                                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ url('/js/resume.js') }}"></script>
@endsection
