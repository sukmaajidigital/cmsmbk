<x-landinglayouts>
    <div class="hero bg-base-200 ">
        <div class="hero-content flex-col lg:flex-row">
            <img src="https://img.daisyui.com/images/stock/photo-1635805737707-575885ab0820.webp" class="max-w-sm rounded-lg shadow-2xl" />
            <div>
                <h1 class="text-5xl font-bold">Box Office News!</h1>
                <p class="py-6">
                    Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
                    quasi. In deleniti eaque aut repudiandae et a id nisi.
                </p>
                <button class="btn btn-primary">Get Started</button>
            </div>
        </div>
    </div>

    <div class="hero bg-base-200 ">
        <div class="hero-content flex-col lg:flex-row-reverse">
            <div class="text-center lg:text-left">
                <h1 class="text-5xl font-bold">Login now!</h1>
                <p class="py-6">
                    Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
                    quasi. In deleniti eaque aut repudiandae et a id nisi.
                </p>
            </div>
            <div class="card bg-base-100 w-full max-w-sm shrink-0 shadow-2xl">
                <div class="card-body">
                    <fieldset class="fieldset">
                        <label class="fieldset-label">Email</label>
                        <input type="email" class="input" placeholder="Email" />
                        <label class="fieldset-label">Password</label>
                        <input type="password" class="input" placeholder="Password" />
                        <div><a class="link link-hover">Forgot password?</a></div>
                        <button class="btn btn-neutral mt-4">Login</button>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

    <div class="hero " style="background-image: url(https://img.daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.webp);">
        <div class="hero-overlay"></div>
        <div class="hero-content text-neutral-content text-center">
            <div class="max-w-md">
                <h1 class="mb-5 text-5xl font-bold">Hello there</h1>
                <p class="mb-5">
                    Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
                    quasi. In deleniti eaque aut repudiandae et a id nisi.
                </p>
                <button class="btn btn-primary">Get Started</button>
            </div>
        </div>
    </div>

    <label class="swap swap-rotate">
        {{-- <!-- this hidden checkbox controls the state --> --}}
        <input type="checkbox" class="theme-controller" value="synthwave" />

        {{-- <!-- sun icon --> --}}
        <svg class="swap-off h-10 w-10 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z" />
        </svg>

        {{-- <!-- moon icon --> --}}
        <svg class="swap-on h-10 w-10 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z" />
        </svg>
    </label>

    {{--  --}}
    <aside>
        <ul class="timeline timeline-snap-icon max-md:timeline-compact timeline-vertical">
            <li>
                <div class="timeline-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="timeline-start mb-10 md:text-end">
                    <time class="font-mono italic">1984</time>
                    <div class="text-lg font-black">First Macintosh computer</div>
                    The Apple Macintosh—later rebranded as the Macintosh 128K—is the original Apple Macintosh
                    personal computer. It played a pivotal role in establishing desktop publishing as a general
                    office function. The motherboard, a 9 in (23 cm) CRT monitor, and a floppy drive were housed
                    in a beige case with integrated carrying handle; it came with a keyboard and single-button
                    mouse.
                </div>
                <hr />
            </li>
            <li>
                <hr />
                <div class="timeline-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="timeline-end md:mb-10">
                    <time class="font-mono italic">1998</time>
                    <div class="text-lg font-black">iMac</div>
                    iMac is a family of all-in-one Mac desktop computers designed and built by Apple Inc. It has
                    been the primary part of Apple's consumer desktop offerings since its debut in August 1998,
                    and has evolved through seven distinct forms
                </div>
                <hr />
            </li>
            <li>
                <hr />
                <div class="timeline-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="timeline-start mb-10 md:text-end">
                    <time class="font-mono italic">2001</time>
                    <div class="text-lg font-black">iPod</div>
                    The iPod is a discontinued series of portable media players and multi-purpose mobile devices
                    designed and marketed by Apple Inc. The first version was released on October 23, 2001, about
                    8+1⁄2 months after the Macintosh version of iTunes was released. Apple sold an estimated 450
                    million iPod products as of 2022. Apple discontinued the iPod product line on May 10, 2022. At
                    over 20 years, the iPod brand is the oldest to be discontinued by Apple
                </div>
                <hr />
            </li>
            <li>
                <hr />
                <div class="timeline-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="timeline-end md:mb-10">
                    <time class="font-mono italic">2007</time>
                    <div class="text-lg font-black">iPhone</div>
                    iPhone is a line of smartphones produced by Apple Inc. that use Apple's own iOS mobile
                    operating system. The first-generation iPhone was announced by then-Apple CEO Steve Jobs on
                    January 9, 2007. Since then, Apple has annually released new iPhone models and iOS updates. As
                    of November 1, 2018, more than 2.2 billion iPhones had been sold. As of 2022, the iPhone
                    accounts for 15.6% of global smartphone market share
                </div>
                <hr />
            </li>
            <li>
                <hr />
                <div class="timeline-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="timeline-start mb-10 md:text-end">
                    <time class="font-mono italic">2015</time>
                    <div class="text-lg font-black">Apple Watch</div>
                    The Apple Watch is a line of smartwatches produced by Apple Inc. It incorporates fitness
                    tracking, health-oriented capabilities, and wireless telecommunication, and integrates with
                    iOS and other Apple products and services
                </div>
            </li>
        </ul>
    </aside>
    {{-- toast --}}
    <div class="toast toast-top toast-middle">
        <div class="alert alert-info">
            <span>New mail arrived.</span>
        </div>
        <div class="alert alert-success">
            <span>Message sent successfully.</span>
        </div>
    </div>



    <script type="module" src="https://unpkg.com/cally"></script>


    <calendar-date class="cally bg-base-100 border border-base-300 shadow-lg rounded-box">
        <svg aria-label="Previous" class="fill-current size-4" slot="previous" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path fill="currentColor" d="M15.75 19.5 8.25 12l7.5-7.5"></path>
        </svg>
        <svg aria-label="Next" class="fill-current size-4" slot="next" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path fill="currentColor" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
        </svg>
        <calendar-month></calendar-month>
    </calendar-date>

</x-landinglayouts>
