<footer class="footer">
    <div class="container-fluid">
        <ul class="nav">
            <li class="nav-item">
                {{-- To do can put your github link in the href --}}
                <a href="" target="blank" class="nav-link">
                    {{ __('Hillal ') }}
                </a>
            </li>
            <li class="nav-item">
                {{-- To do can put your github link in the href --}}
                <a href="" target="blank" class="nav-link">
                    {{ __('Wilson') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    {{ __('About Us') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    {{ __('Blog') }}
                </a>
            </li>
        </ul>
        <div class="copyright">
            &copy; {{ now()->year }} {{ __('made with') }} Expertise {{ __('by') }}
            {{-- To do can put your github link in the href --}}
            <a href="" target="_blank">{{ __('Hillal ') }}</a> &amp;
            {{-- To do can put your github link in the href --}}
            <a href="" target="_blank">{{ __('Wilson') }}</a> {{ __('for a better results management system') }}.
        </div>
    </div>
</footer>
