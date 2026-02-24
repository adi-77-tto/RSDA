@extends('main')

@section('content')
  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Programs</li>
      </ol>
      <h2>Featured Programs</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">
      <div class="section-title">
        <h2>Featured Programs</h2>

        {{-- Filter Buttons --}}
        <div class="d-flex flex-wrap gap-2 justify-content-center mt-3 mb-4" id="program-filter-btns">
            <button class="btn btn-sm program-filter-btn active-filter"
                    data-filter="active"
                    style="border-radius:20px; padding:6px 22px; font-weight:600; font-size:13px;
                           background:#28a745; color:#fff; border:none;">
                Active
            </button>
            <button class="btn btn-sm program-filter-btn"
                    data-filter="ongoing"
                    style="border-radius:20px; padding:6px 22px; font-weight:600; font-size:13px;
                           background:#f0f0f0; color:#444; border:none;">
                Ongoing
            </button>
            <button class="btn btn-sm program-filter-btn"
                    data-filter="completed"
                    style="border-radius:20px; padding:6px 22px; font-weight:600; font-size:13px;
                           background:#f0f0f0; color:#444; border:none;">
                Completed
            </button>
        </div>

        @if(isset($programs) && count($programs) > 0)
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3 mt-2" id="programs-grid">
                @foreach($programs as $program)
                <div class="col program-card-col" data-status="{{ strtolower($program->status) }}">
                    <div class="card border-0 shadow-sm h-100 text-start">
                        @if($program->image)
                        <img src="{{ asset('images/programs/'.$program->image) }}" class="card-img-top" alt="{{ $program->title }}" style="height:170px; object-fit:cover;">
                        @else
                        <img src="https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="card-img-top" alt="{{ $program->title }}" style="height:170px; object-fit:cover;">
                        @endif
                        <div class="card-body d-flex flex-column" style="padding:14px;">
                            <h6 class="card-title mb-1" style="font-size:14px; font-weight:700; line-height:1.3;">{{ Str::limit($program->title, 50, '...') }}</h6>
                            <p class="card-text" style="font-size:12px; color:#555; flex-grow:1;">
                                {{ Str::limit($program->description, 70, "...") }}
                            </p>
                            <div class="d-flex align-items-center justify-content-between mt-auto">
                                <span class="fp-tag {{ $program->status == 'active' ? '' : ($program->status == 'completed' ? 'fp-tag-completed' : 'fp-tag-alt') }}" style="font-size:12px; padding:4px 14px;">
                                    {{ ucfirst($program->status) }}
                                </span>
                                <a href="{{ route('programs.view', $program->id) }}" class="text-primary" style="font-size:12px; font-weight:600;">
                                    <i class="fa fa-arrow-right"></i> Read More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Empty state message shown when filter has no results --}}
            <p id="no-programs-msg" class="text-center text-muted fs-5 mt-4" style="display:none;">
                No programs found for this category.
            </p>
        @else
            <p class="text-center text-muted fs-5">No programs available at the moment.</p>
        @endif
        </div>
      </div>
    </div>
  </section>
  <!-- End of Featured Programs -->

  <script>
    (function () {
        const activeColor    = { active: '#28a745',  ongoing: '#fd7e14', completed: '#6c757d' };
        const inactiveStyle  = 'background:#f0f0f0; color:#444; border:none;';

        function applyFilter(filter) {
            const cards  = document.querySelectorAll('.program-card-col');
            const msg    = document.getElementById('no-programs-msg');
            let visible  = 0;

            cards.forEach(function (card) {
                if (card.dataset.status === filter) {
                    card.style.display = '';
                    visible++;
                } else {
                    card.style.display = 'none';
                }
            });

            if (msg) msg.style.display = (visible === 0) ? 'block' : 'none';

            // Update button styles
            document.querySelectorAll('.program-filter-btn').forEach(function (btn) {
                if (btn.dataset.filter === filter) {
                    btn.style.cssText = 'border-radius:20px; padding:6px 22px; font-weight:600; font-size:13px;'
                        + 'background:' + activeColor[filter] + '; color:#fff; border:none;';
                    btn.classList.add('active-filter');
                } else {
                    btn.style.cssText = inactiveStyle + 'border-radius:20px; padding:6px 22px; font-weight:600; font-size:13px;';
                    btn.classList.remove('active-filter');
                }
            });
        }

        // Attach click listeners
        document.querySelectorAll('.program-filter-btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                applyFilter(this.dataset.filter);
            });
        });

        // Default: show active programs on page load
        applyFilter('active');
    })();
  </script>

@endsection
