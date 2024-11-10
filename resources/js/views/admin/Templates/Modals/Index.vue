<template>
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Row-->
            <div class="row g-5 g-xl-8">
                <div class="col-xl-12">
                    <!--begin::Statistics Widget 5-->
                    <div class="card">
                        <div class="card-header pb-5">
                            <div class="flex-column">
                                <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">Form Templates</div>
                                <div class="fw-bold text-gray-400">Aplikasi <span class="text-primary">Bimbel-Ku</span>
                                </div>
                            </div>
                        </div>

                        <!--begin::Card Body-->
                        <div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">
                            <!--begin::Section-->
                            <div class="pb-10">
                                <!--begin::Heading-->
                                <h1 class="anchor fw-bolder mb-5" id="overview">
                                    <a href="#overview"></a>Overview
                                </h1>
                                <!--end::Heading-->
                                <!--begin::Block-->
                                <div class="py-5">Metronic customizes the
                                    <a href="https://getbootstrap.com/docs/5.0/components/modal/"
                                        class="fw-bold">Bootstrap Modal</a>&#160; through the SASS variables in
                                    <code>src/sass/_variables.scss</code>and adds additonal options in
                                    <code>src/sass/_modal.scss</code>.
                                </div>
                                <!--end::Block-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Section-->
                            <div class="pt-10">
                                <!--begin::Heading-->
                                <h1 class="anchor fw-bolder mb-5" id="basic">
                                    <a href="#basic"></a>Basic Example
                                </h1>
                                <!--end::Heading-->
                                <!--begin::Block-->
                                <div class="py-5">Click the below toggle button to see a slightly customized modal with
                                    custom close icon button.</div>
                                <!--end::Block-->
                                <!--begin::Block-->
                                <div class="py-5">
                                    <div class="rounded border p-10">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_1">Launch demo modal</button>
                                        <div class="modal fade" tabindex="-1" id="kt_modal_1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Modal title</h5>
                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                            <span class="svg-icon svg-icon-2x">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                                        height="2" rx="1"
                                                                        transform="rotate(-45 6 17.3137)"
                                                                        fill="black" />
                                                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                                        transform="rotate(45 7.41422 6)" fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Modal body text goes here.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Block-->
                                <!--begin::Code-->
                                <div class="py-5">
                                    <!--begin::Highlight-->
                                    <div class="highlight">
                                        <button class="highlight-copy btn" data-bs-toggle="tooltip"
                                            title="Copy code">copy</button>
                                        <div class="highlight-code">
                                            <pre class="language-html" style="height:400px">
<code class="language-html">&lt;button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_1"&gt;
    Launch demo modal
&lt;/button&gt;

&lt;div class="modal fade" tabindex="-1" id="kt_modal_1"&gt;
    &lt;div class="modal-dialog"&gt;
        &lt;div class="modal-content"&gt;
            &lt;div class="modal-header"&gt;
                &lt;h5 class="modal-title"&gt;Modal title&lt;/h5&gt;

                &lt;!--begin::Close--&gt;
                &lt;div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close"&gt;
                    &lt;span class="svg-icon svg-icon-2x"&gt;&lt;/span&gt;
                &lt;/div&gt;
                &lt;!--end::Close--&gt;
            &lt;/div&gt;

            &lt;div class="modal-body"&gt;
                &lt;p&gt;Modal body text goes here.&lt;/p&gt;
            &lt;/div&gt;

            &lt;div class="modal-footer"&gt;
                &lt;button type="button" class="btn btn-light" data-bs-dismiss="modal"&gt;Close&lt;/button&gt;
                &lt;button type="button" class="btn btn-primary"&gt;Save changes&lt;/button&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;</code>
</pre>
                                        </div>
                                    </div>
                                    <!--end::Highlight-->
                                </div>
                                <!--end::Code-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Section-->
                            <div class="pt-10">
                                <!--begin::Heading-->
                                <h1 class="anchor fw-bolder mb-5" id="fullscreen">
                                    <a href="#fullscreen"></a>Fullscreen
                                </h1>
                                <!--end::Heading-->
                                <!--begin::Block-->
                                <div class="py-5">Add
                                    <code>.modal-fullscreen</code>class to enable a modal with fullscreen mode. Add
                                    <code>.bg-white</code>and
                                    <code>.shadow-none</code>classes to fix background color and unwanted shadow issue
                                    when modal has a long scrollable content.
                                </div>
                                <!--end::Block-->
                                <!--begin::Block-->
                                <div class="py-5">
                                    <div class="rounded border p-10">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_2">Launch demo modal</button>
                                        <div class="modal bg-white fade" tabindex="-1" id="kt_modal_2">
                                            <div class="modal-dialog modal-fullscreen">
                                                <div class="modal-content shadow-none">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Modal title</h5>
                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                            <span class="svg-icon svg-icon-2x">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                                        height="2" rx="1"
                                                                        transform="rotate(-45 6 17.3137)"
                                                                        fill="black" />
                                                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                                        transform="rotate(45 7.41422 6)" fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Modal body text goes here.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Block-->
                                <!--begin::Code-->
                                <div class="py-5">
                                    <!--begin::Highlight-->
                                    <div class="highlight">
                                        <button class="highlight-copy btn" data-bs-toggle="tooltip"
                                            title="Copy code">copy</button>
                                        <div class="highlight-code">
                                            <pre class="language-html" style="height:400px">
<code class="language-html">&lt;button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_2"&gt;
    Launch demo modal
&lt;/button&gt;

&lt;div class="modal bg-white fade" tabindex="-1" id="kt_modal_2"&gt;
    &lt;div class="modal-dialog modal-fullscreen"&gt;
        &lt;div class="modal-content shadow-none"&gt;
            &lt;div class="modal-header"&gt;
                &lt;h5 class="modal-title"&gt;Modal title&lt;/h5&gt;

                &lt;!--begin::Close--&gt;
                &lt;div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close"&gt;
                    &lt;span class="svg-icon svg-icon-2x"&gt;&lt;/span&gt;
                &lt;/div&gt;
                &lt;!--end::Close--&gt;
            &lt;/div&gt;

            &lt;div class="modal-body"&gt;
                &lt;p&gt;Modal body text goes here.&lt;/p&gt;
            &lt;/div&gt;

            &lt;div class="modal-footer"&gt;
                &lt;button type="button" class="btn btn-light" data-bs-dismiss="modal"&gt;Close&lt;/button&gt;
                &lt;button type="button" class="btn btn-primary"&gt;Save changes&lt;/button&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;</code>
</pre>
                                        </div>
                                    </div>
                                    <!--end::Highlight-->
                                </div>
                                <!--end::Code-->
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Card Body-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>



<script>
export default {
    mounted() {
        this.$initializeAppPlugins();
        // this.getDataTable()
    },
}
</script>