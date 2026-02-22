{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-light ftco_navbar ftco-navbar-light" id="ftco-navbar">
    <div class="container" style="max-width: 1200px; padding-left: 0;">
        <a class="navbar-brand" href="{{ url('/') }}" style="padding: 8px 0; margin-right: 0; margin-left: -5px;">
            <img src="{{ asset('images/application/'.application()->main_logo) }}" alt="Logo" style="height: 45px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="ftco-nav">
            <ul class="navbar-nav align-items-center">
                {{-- Home --}}
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a href="{{ url('/') }}" class="nav-link">Home</a>
                </li>

                {{-- About us --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="aboutDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        About us
                    </a>
                    <div class="dropdown-menu" aria-labelledby="aboutDropdown">
                        <a class="dropdown-item" href="{{ route('about.us') }}">About RSDA</a>
                        <a class="dropdown-item" href="{{ route('vision.mission') }}">Mission, Vision & Values</a>
                        <a class="dropdown-item" href="{{ route('key.focus.area') }}">Focus Area</a>
                        <a class="dropdown-item" href="{{ route('team.members') }}">Team Members</a>
                        <a class="dropdown-item" href="{{ route('origin_affilation') }}">Origin and Legal Affiliation</a>
                        <a class="dropdown-item" href="{{ route('executive.committee') }}">Executive Committee</a>
                        <a class="dropdown-item" href="{{ route('cheif.message') }}">Message from Chief Executive</a>
                        <a class="dropdown-item" href="{{ route('partner.donor') }}">Our Partners and Donor</a>
                        <a class="dropdown-item" href="{{ route('about.impact') }}">Impact</a>
                    </div>
                </li>

                {{-- Programs --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="programsDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        Programs
                    </a>
                    <div class="dropdown-menu" aria-labelledby="programsDropdown">
                        <a class="dropdown-item" href="{{ route('programs.all') }}">Featured Programs</a>
                        <a class="dropdown-item" href="{{ route('key.focus.area') }}">Key Focus Area</a>
                        <a class="dropdown-item" href="{{ route('ongoing.project') }}">Ongoing Programs</a>
                        <a class="dropdown-item" href="{{ route('project.archieve') }}">Project Archieve</a>
                        <a class="dropdown-item" href="{{ route('success.stories') }}">Success Stories</a>
                    </div>
                </li>

                {{-- Get Involved --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="involvedDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        Get Involved
                    </a>
                    <div class="dropdown-menu" aria-labelledby="involvedDropdown">
                        <a class="dropdown-item" href="{{ route('volunterr.opportunities') }}">Volunteer Opportunities</a>
                        <a class="dropdown-item" href="{{ route('donate') }}">Donate</a>
                        <a class="dropdown-item" href="{{ route('fundraising') }}">Fundraising Campaign</a>
                        <a class="dropdown-item" href="{{ route('corporate.partnership') }}">Corporate Partnership</a>
                        <a class="dropdown-item" href="{{ route('invoked.career') }}">Career with RSDA</a>
                    </div>
                </li>

                {{-- News & Events --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="eventsDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        News & Events
                    </a>
                    <div class="dropdown-menu" aria-labelledby="eventsDropdown">
                        <a class="dropdown-item" href="{{ route('latest.news.all') }}">News & Events</a>
                        <a class="dropdown-item" href="{{ route('events.calender') }}">Events Calender</a>
                        <a class="dropdown-item" href="{{ route('youtube.video') }}">Youtube Video</a>
                        <a class="dropdown-item" href="{{ route('strategic.plan') }}">RSDA Strategic Plan</a>
                        <a class="dropdown-item" href="{{ route('policy.guideline') }}">Policy & Guideline</a>
                        <a class="dropdown-item" href="{{ route('publication') }}">Publication</a>
                    </div>
                </li>

                {{-- Gallery --}}
                <li class="nav-item">
                    <a href="{{ route('photo.all') }}" class="nav-link">Gallery</a>
                </li>

                {{-- Contact --}}
                <li class="nav-item">
                    <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                </li>
            </ul>

            {{-- Donate Button --}}
            <a href="{{ route('donate') }}" class="nav-donate-btn">Donate</a>
        </div>
    </div>
</nav>
{{-- END nav --}}
