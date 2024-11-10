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
                                    <a href="https://getbootstrap.com/docs/5.0/forms/overview/"
                                        class="fw-bold">Bootstrap Forms</a>&#160; through the SASS variables in
                                    <code>src/sass/_variables.scss</code>and adds additonal options for the form
                                    elements in
                                    <code>src/sass/forms/</code>.
                                </div>
                                <!--end::Block-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Section-->
                            <div class="py-10">
                                <!--begin::Heading-->
                                <h1 class="anchor fw-bolder mb-5" id="custom-form-control">
                                    <a href="#custom-form-control"></a>Custom Form Control
                                </h1>
                                <!--end::Heading-->
                                <!--begin::Block-->
                                <div class="py-5">Use
                                    <code>.form-control-solid</code>class with
                                    <code>.form-control</code>to set solid background style for a form control:
                                </div>
                                <!--end::Block-->
                                <!--begin::Block-->
                                <div class="py-5">
                                    <div class="rounded border p-10">
                                        <div class="mb-10">
                                            <label class="form-label">Default input</label>
                                            <input type="text" class="form-control" placeholder="name@example.com" />
                                        </div>
                                        <div class="mb-10">
                                            <label class="form-label">Solid background style</label>
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="name@example.com" />
                                        </div>
                                        <div class="mb-10">
                                            <label class="form-label">White background style</label>
                                            <input type="text" class="form-control form-control-white"
                                                placeholder="name@example.com" />
                                        </div>
                                        <!--begin::Code-->
                                        <div class="py-0">
                                            <!--begin::Highlight-->
                                            <div class="highlight">
                                                <button class="highlight-copy btn" data-bs-toggle="tooltip"
                                                    title="Copy code">copy</button>
                                                <div class="highlight-code">
                                                    <pre class="language-html">
<code class="language-html">&lt;input type="text" class="form-control" placeholder="name@example.com"/&gt;
&lt;input type="text" class="form-control form-control-solid" placeholder="name@example.com"/&gt;
&lt;input type="text" class="form-control form-control-white" placeholder="name@example.com"/&gt;</code>
</pre>
                                                </div>
                                            </div>
                                            <!--end::Highlight-->
                                        </div>
                                        <!--end::Code-->
                                    </div>
                                </div>
                                <!--end::Block-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Section-->
                            <div class="py-10">
                                <!--begin::Heading-->
                                <h1 class="anchor fw-bolder mb-5" id="custom-form-control">
                                    <a href="#custom-form-control"></a>Flush Form Control
                                </h1>
                                <!--end::Heading-->
                                <!--begin::Block-->
                                <div class="py-5">Use
                                    <code>.form-control-flush</code>class with
                                    <code>.form-control</code>to remove the default background-color, borders, and
                                    rounded corners of a form input.
                                </div>
                                <!--end::Block-->
                                <!--begin::Block-->
                                <div class="py-5">
                                    <div class="rounded border p-10">
                                        <div class="mb-10">
                                            <label for="exampleFormControlInput1" class="form-label">Example</label>
                                            <input type="email" class="form-control form-control-flush"
                                                placeholder="Example input" />
                                        </div>
                                        <!--begin::Code-->
                                        <div class="py-0">
                                            <!--begin::Highlight-->
                                            <div class="highlight">
                                                <button class="highlight-copy btn" data-bs-toggle="tooltip"
                                                    title="Copy code">copy</button>
                                                <div class="highlight-code">
                                                    <pre class="language-html">
<code class="language-html">&lt;input type="email" class="form-control form-control-flush" placeholder="Example input"/&gt;</code>
</pre>
                                                </div>
                                            </div>
                                            <!--end::Highlight-->
                                        </div>
                                        <!--end::Code-->
                                    </div>
                                </div>
                                <!--end::Block-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Section-->
                            <div class="py-10">
                                <!--begin::Heading-->
                                <h1 class="anchor fw-bolder mb-5" id="custom-form-control">
                                    <a href="#custom-form-control"></a>Form Labels
                                </h1>
                                <!--end::Heading-->
                                <!--begin::Block-->
                                <div class="py-5">Use
                                    <code>.required</code>class with
                                    <code>.form-label</code>or any custom element to indicate input's mandatory status:
                                </div>
                                <!--end::Block-->
                                <!--begin::Block-->
                                <div class="py-5">
                                    <div class="rounded border p-10">
                                        <div class="mb-10">
                                            <label for="exampleFormControlInput1"
                                                class="required form-label">Example</label>
                                            <input type="email" class="form-control form-control-solid"
                                                placeholder="Example input" />
                                        </div>
                                        <!--begin::Code-->
                                        <div class="py-0">
                                            <!--begin::Highlight-->
                                            <div class="highlight">
                                                <button class="highlight-copy btn" data-bs-toggle="tooltip"
                                                    title="Copy code">copy</button>
                                                <div class="highlight-code">
                                                    <pre class="language-html">
<code class="language-html">&lt;div class="mb-10"&gt;
    &lt;label for="exampleFormControlInput1" class="required form-label"&gt;Example&lt;/label&gt;
    &lt;input type="email" class="form-control form-control-solid" placeholder="Example input"/&gt;
&lt;/div&gt;</code>
</pre>
                                                </div>
                                            </div>
                                            <!--end::Highlight-->
                                        </div>
                                        <!--end::Code-->
                                    </div>
                                </div>
                                <!--end::Block-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Section-->
                            <div class="py-10">
                                <!--begin::Heading-->
                                <h1 class="anchor fw-bolder mb-5" id="custom-form-select">
                                    <a href="#custom-form-select"></a>Custom Form Select
                                </h1>
                                <!--end::Heading-->
                                <!--begin::Block-->
                                <div class="py-5">Use
                                    <code>.form-select-solid</code>class with
                                    <code>.form-select</code>to set solid background style for a form select:
                                </div>
                                <!--end::Block-->
                                <!--begin::Block-->
                                <div class="py-5">
                                    <div class="rounded border p-10">
                                        <div class="mb-10">
                                            <label for="exampleFormControlInput1" class="form-label">Default
                                                select</label>
                                            <select class="form-select" aria-label="Select example">
                                                <option>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <div class="mb-10">
                                            <label for="exampleFormControlInput1" class="form-label">Solid background
                                                style</label>
                                            <select class="form-select form-select-solid" aria-label="Select example">
                                                <option>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <div class="mb-10">
                                            <label for="exampleFormControlTextarea1" class="form-label">White background
                                                style</label>
                                            <select class="form-select form-select-white" aria-label="Select example">
                                                <option>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <!--begin::Code-->
                                        <div class="py-0">
                                            <!--begin::Highlight-->
                                            <div class="highlight">
                                                <button class="highlight-copy btn" data-bs-toggle="tooltip"
                                                    title="Copy code">copy</button>
                                                <div class="highlight-code">
                                                    <pre class="language-html" style="height:400px">
<code class="language-html">&lt;select class="form-select" aria-label="Select example"&gt;
    &lt;option&gt;Open this select menu&lt;/option&gt;
    &lt;option value="1"&gt;One&lt;/option&gt;
    &lt;option value="2"&gt;Two&lt;/option&gt;
    &lt;option value="3"&gt;Three&lt;/option&gt;
&lt;/select&gt;

&lt;select class="form-select form-select-solid" aria-label="Select example"&gt;
    &lt;option&gt;Open this select menu&lt;/option&gt;
    &lt;option value="1"&gt;One&lt;/option&gt;
    &lt;option value="2"&gt;Two&lt;/option&gt;
    &lt;option value="3"&gt;Three&lt;/option&gt;
&lt;/select&gt;

&lt;select class="form-select form-select-white" aria-label="Select example"&gt;
    &lt;option&gt;Open this select menu&lt;/option&gt;
    &lt;option value="1"&gt;One&lt;/option&gt;
    &lt;option value="2"&gt;Two&lt;/option&gt;
    &lt;option value="3"&gt;Three&lt;/option&gt;
&lt;/select&gt;</code>
</pre>
                                                </div>
                                            </div>
                                            <!--end::Highlight-->
                                        </div>
                                        <!--end::Code-->
                                    </div>
                                </div>
                                <!--end::Block-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Section-->
                            <div class="py-10">
                                <!--begin::Heading-->
                                <h1 class="anchor fw-bolder mb-5" id="custom-checkbox-and-radio">
                                    <a href="#custom-checkbox-and-radio"></a>Custom Checkbox &amp; Radio
                                </h1>
                                <!--end::Heading-->
                                <!--begin::Block-->
                                <div class="py-5">Use
                                    <code>.form-check-custom</code>and
                                    <code>.form-check-solid</code>class with
                                    <code>.form-check</code>to set custom layout with solid background style for a form
                                    check:
                                </div>
                                <!--end::Block-->
                                <!--begin::Block-->
                                <div class="py-5">
                                    <div class="rounded border p-10">
                                        <div class="mb-10">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault" />
                                                <label class="form-check-label" for="flexCheckDefault">Default
                                                    checkbox</label>
                                            </div>
                                        </div>
                                        <div class="mb-10">
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" />
                                                <span class="form-check-label">Without id linking</span>
                                            </label>
                                        </div>
                                        <div class="mb-10">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckChecked" checked="checked" />
                                                <label class="form-check-label" for="flexCheckChecked">Checked
                                                    checkbox</label>
                                            </div>
                                        </div>
                                        <div class="mb-10">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    disabled="disabled" id="flexCheckDisabled" />
                                                <label class="form-check-label" for="flexCheckDisabled">Disabled
                                                    checkbox</label>
                                            </div>
                                        </div>
                                        <div class="mb-10">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="radio" value=""
                                                    id="flexRadioDefault" />
                                                <label class="form-check-label" for="flexRadioDefault">Default
                                                    radio</label>
                                            </div>
                                        </div>
                                        <div class="mb-10">
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="radio" value="" />
                                                <span class="form-check-label">Without id linking</span>
                                            </label>
                                        </div>
                                        <div class="mb-10">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="radio" value=""
                                                    id="flexRadioChecked" checked="checked" />
                                                <label class="form-check-label" for="flexRadioChecked">Checked
                                                    radio</label>
                                            </div>
                                        </div>
                                        <div class="mb-10">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="radio" value=""
                                                    disabled="disabled" id="flexRadioDisabled" />
                                                <label class="form-check-label" for="flexRadioDisabled">Disabled
                                                    radio</label>
                                            </div>
                                        </div>
                                        <!--begin::Code-->
                                        <div class="py-0">
                                            <!--begin::Highlight-->
                                            <div class="highlight">
                                                <button class="highlight-copy btn" data-bs-toggle="tooltip"
                                                    title="Copy code">copy</button>
                                                <div class="highlight-code">
                                                    <pre class="language-html" style="height:400px">
<code class="language-html">&lt;div class="form-check form-check-custom form-check-solid"&gt;
    &lt;input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"/&gt;
    &lt;label class="form-check-label" for="flexCheckDefault"&gt;
        Default checkbox
    &lt;/label&gt;
&lt;/div&gt;

&lt;label class="form-check form-check-custom form-check-solid"&gt;
    &lt;input class="form-check-input" type="checkbox" value=""/&gt;
    &lt;span class="form-check-label"&gt;
        Without id linking
    &lt;/span&gt;
&lt;/label&gt;

&lt;div class="form-check form-check-custom form-check-solid"&gt;
    &lt;input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked="checked" /&gt;
    &lt;label class="form-check-label" for="flexCheckChecked"&gt;
        Checked checkbox
    &lt;/label&gt;
&lt;/div&gt;

&lt;div class="form-check form-check-custom form-check-solid"&gt;
    &lt;input class="form-check-input" type="checkbox" value="" disabled id="flexCheckDisabled" /&gt;
    &lt;label class="form-check-label" for="flexCheckDisabled"&gt;
        Disabled checkbox
    &lt;/label&gt;
&lt;/div&gt;

&lt;div class="form-check form-check-custom form-check-solid"&gt;
    &lt;input class="form-check-input" type="radio" value="" id="flexRadioDefault"/&gt;
    &lt;label class="form-check-label" for="flexRadioDefault"&gt;
        Default radio
    &lt;/label&gt;
&lt;/div&gt;

&lt;label class="form-check form-check-custom form-check-solid"&gt;
    &lt;input class="form-check-input" type="radio" value=""/&gt;
    &lt;span class="form-check-label"&gt;
         id="flexRadioDefault"
    &lt;/span&gt;
&lt;/label&gt;

&lt;div class="form-check form-check-custom form-check-solid"&gt;
    &lt;input class="form-check-input" type="radio" value="" id="flexRadioChecked" checked="checked" /&gt;
    &lt;label class="form-check-label" for="flexRadioChecked"&gt;
        Checked radio
    &lt;/label&gt;
&lt;/div&gt;

&lt;div class="form-check form-check-custom form-check-solid"&gt;
    &lt;input class="form-check-input" type="radio" value="" disabled id="flexRadioDisabled"/&gt;
    &lt;label class="form-check-label" for="flexRadioDisabled"&gt;
        Disabled radio
    &lt;/label&gt;
&lt;/div&gt;</code>
</pre>
                                                </div>
                                            </div>
                                            <!--end::Highlight-->
                                        </div>
                                        <!--end::Code-->
                                    </div>
                                </div>
                                <!--end::Block-->
                                <!--begin::Block-->
                                <div class="pt-10 pb-5">Use
                                    <code>.form-check-{sm, lg}</code>fixed size classes for checkbox and radio to change
                                    their sizes:
                                </div>
                                <!--end::Block-->
                                <!--begin::Block-->
                                <div class="py-5">
                                    <div class="rounded border p-10">
                                        <div class="mb-10">
                                            <div class="form-check form-check-custom form-check-solid form-check-lg">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckboxLg" />
                                                <label class="form-check-label" for="flexCheckboxLg">Large
                                                    checkbox</label>
                                            </div>
                                        </div>
                                        <div class="mb-10">
                                            <div class="form-check form-check-custom form-check-solid form-check-lg">
                                                <input class="form-check-input" type="radio" value=""
                                                    id="flexCheckboxSm" />
                                                <label class="form-check-label" for="flexCheckboxSm">Large radio</label>
                                            </div>
                                        </div>
                                        <div class="mb-10">
                                            <div class="form-check form-check-custom form-check-solid form-check-sm">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexRadioLg" />
                                                <label class="form-check-label" for="flexRadioLg">Small checkbox</label>
                                            </div>
                                        </div>
                                        <div class="mb-10">
                                            <div class="form-check form-check-custom form-check-solid form-check-sm">
                                                <input class="form-check-input" type="radio" value=""
                                                    id="flexRadioSm" />
                                                <label class="form-check-label" for="flexRadioSm">Small radio</label>
                                            </div>
                                        </div>
                                        <!--begin::Code-->
                                        <div class="py-0">
                                            <!--begin::Highlight-->
                                            <div class="highlight">
                                                <button class="highlight-copy btn" data-bs-toggle="tooltip"
                                                    title="Copy code">copy</button>
                                                <div class="highlight-code">
                                                    <pre class="language-html" style="height:400px">
<code class="language-html">&lt;div class="form-check form-check-custom form-check-solid form-check-lg"&gt;
    &lt;input class="form-check-input" type="checkbox" value="" id="flexCheckboxLg"/&gt;
    &lt;label class="form-check-label" for="flexCheckboxLg"&gt;
        Large checkbox
    &lt;/label&gt;
&lt;/div&gt;

&lt;div class="form-check form-check-custom form-check-solid form-check-lg"&gt;
    &lt;input class="form-check-input" type="radio" value="" id="flexCheckboxSm"  /&gt;
    &lt;label class="form-check-label" for="flexCheckboxSm"&gt;
        Large radio
    &lt;/label&gt;
&lt;/div&gt;

&lt;div class="form-check form-check-custom form-check-solid form-check-sm"&gt;
    &lt;input class="form-check-input" type="checkbox" value="" id="flexRadioLg"/&gt;
    &lt;label class="form-check-label" for="flexRadioLg"&gt;
        Small checkbox
    &lt;/label&gt;
&lt;/div&gt;

&lt;div class="form-check form-check-custom form-check-solid form-check-sm"&gt;
    &lt;input class="form-check-input" type="radio" value="" id="flexRadioSm"  /&gt;
    &lt;label class="form-check-label" for="flexRadioSm"&gt;
        Small radio
    &lt;/label&gt;
&lt;/div&gt;</code>
</pre>
                                                </div>
                                            </div>
                                            <!--end::Highlight-->
                                        </div>
                                        <!--end::Code-->
                                    </div>
                                </div>
                                <!--end::Block-->
                                <!--begin::Block-->
                                <div class="pt-15 pb-5">Use
                                    <a class="fw-bold"
                                        href="../../demo8/dist/documentation/base/utilities#width-and-height.html"
                                        target="_blank">Custom Size Classes</a>&#160; for checkbox and radio to set
                                    custom sizes:
                                </div>
                                <!--end::Block-->
                                <!--begin::Block-->
                                <div class="py-5">
                                    <div class="rounded border p-10">
                                        <div class="mb-10 d-flex">
                                            <div class="form-check form-check-custom form-check-solid me-10">
                                                <input class="form-check-input h-30px w-30px" type="checkbox" value=""
                                                    id="flexCheckbox30" />
                                                <label class="form-check-label" for="flexCheckbox30">40px</label>
                                            </div>
                                            <div class="form-check form-check-custom form-check-solid me-10">
                                                <input class="form-check-input h-40px w-40px" type="checkbox" value=""
                                                    id="flexCheckbox40" />
                                                <label class="form-check-label" for="flexCheckbox40">40px</label>
                                            </div>
                                            <div class="form-check form-check-custom form-check-solid me-10">
                                                <input class="form-check-input h-50px w-50px" type="checkbox" value=""
                                                    id="flexCheckbox50" />
                                                <label class="form-check-label" for="flexCheckbox50">50px</label>
                                            </div>
                                        </div>
                                        <div class="mb-10 d-flex">
                                            <div class="form-check form-check-custom form-check-solid me-10">
                                                <input class="form-check-input h-30px w-30px" type="radio" value=""
                                                    id="flexRadio30" />
                                                <label class="form-check-label" for="flexRadio30">40px</label>
                                            </div>
                                            <div class="form-check form-check-custom form-check-solid me-10">
                                                <input class="form-check-input h-40px w-40px" type="radio" value=""
                                                    id="flexRadio40" />
                                                <label class="form-check-label" for="flexRadio40">40px</label>
                                            </div>
                                            <div class="form-check form-check-custom form-check-solid me-10">
                                                <input class="form-check-input h-50px w-50px" type="radio" value=""
                                                    id="flexRadio50" />
                                                <label class="form-check-label" for="flexRadio50">50px</label>
                                            </div>
                                        </div>
                                        <!--begin::Code-->
                                        <div class="py-0">
                                            <!--begin::Highlight-->
                                            <div class="highlight">
                                                <button class="highlight-copy btn" data-bs-toggle="tooltip"
                                                    title="Copy code">copy</button>
                                                <div class="highlight-code">
                                                    <pre class="language-html" style="height:400px">
<code class="language-html">&lt;div class="form-check form-check-custom form-check-solid me-10"&gt;
    &lt;input class="form-check-input h-30px w-30px" type="checkbox" value="" id="flexCheckbox30"/&gt;
    &lt;label class="form-check-label" for="flexCheckbox30"&gt;
        40px
    &lt;/label&gt;
&lt;/div&gt;

&lt;div class="form-check form-check-custom form-check-solid me-10"&gt;
    &lt;input class="form-check-input h-40px w-40px" type="checkbox" value="" id="flexCheckbox40"/&gt;
    &lt;label class="form-check-label" for="flexCheckbox40"&gt;
        40px
    &lt;/label&gt;
&lt;/div&gt;

&lt;div class="form-check form-check-custom form-check-solid me-10"&gt;
    &lt;input class="form-check-input h-50px w-50px" type="checkbox" value="" id="flexCheckbox50"/&gt;
    &lt;label class="form-check-label" for="flexCheckbox50"&gt;
        50px
    &lt;/label&gt;
&lt;/div&gt;

&lt;div class="form-check form-check-custom form-check-solid me-10"&gt;
    &lt;input class="form-check-input h-30px w-30px" type="radio" value="" id="flexRadio30"/&gt;
    &lt;label class="form-check-label" for="flexRadio30"&gt;
        40px
    &lt;/label&gt;
&lt;/div&gt;

&lt;div class="form-check form-check-custom form-check-solid me-10"&gt;
    &lt;input class="form-check-input h-40px w-40px" type="radio" value="" id="flexRadio40"/&gt;
    &lt;label class="form-check-label" for="flexRadio40"&gt;
        40px
    &lt;/label&gt;
&lt;/div&gt;

&lt;div class="form-check form-check-custom form-check-solid me-10"&gt;
    &lt;input class="form-check-input h-50px w-50px" type="radio" value="" id="flexRadio50"/&gt;
    &lt;label class="form-check-label" for="flexRadio50"&gt;
        50px
    &lt;/label&gt;
&lt;/div&gt;</code>
</pre>
                                                </div>
                                            </div>
                                            <!--end::Highlight-->
                                        </div>
                                        <!--end::Code-->
                                    </div>
                                </div>
                                <!--end::Block-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Section-->
                            <div class="pt-10">
                                <!--begin::Heading-->
                                <h1 class="anchor fw-bolder mb-5" id="custom-switch">
                                    <a href="#custom-switch"></a>Custom Switch
                                </h1>
                                <!--end::Heading-->
                                <!--begin::Block-->
                                <div class="py-5">Use
                                    <code>.form-check-custom</code>and
                                    <code>.form-check-solid</code>class with
                                    <code>.form-switch</code>to set custom layout with solid background style for a form
                                    switch:
                                </div>
                                <!--end::Block-->
                                <!--begin::Block-->
                                <div class="py-5">
                                    <div class="rounded border p-10">
                                        <div class="mb-10">
                                            <div class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexSwitchDefault" />
                                                <label class="form-check-label" for="flexSwitchDefault">Default
                                                    switch</label>
                                            </div>
                                        </div>
                                        <div class="mb-10">
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" />
                                                <span class="form-check-label">Without id linking</span>
                                            </label>
                                        </div>
                                        <div class="mb-10">
                                            <div class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexSwitchChecked" checked="checked" />
                                                <label class="form-check-label" for="flexSwitchChecked">Checked
                                                    switch</label>
                                            </div>
                                        </div>
                                        <div class="mb-10">
                                            <div class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexSwitchDisabled" disabled="disabled" checked="checked" />
                                                <label class="form-check-label" for="flexSwitchDisabled">Disabled
                                                    switch</label>
                                            </div>
                                        </div>
                                        <!--begin::Code-->
                                        <div class="py-0">
                                            <!--begin::Highlight-->
                                            <div class="highlight">
                                                <button class="highlight-copy btn" data-bs-toggle="tooltip"
                                                    title="Copy code">copy</button>
                                                <div class="highlight-code">
                                                    <pre class="language-html" style="height:400px">
<code class="language-html">&lt;div class="form-check form-switch form-check-custom form-check-solid"&gt;
    &lt;input class="form-check-input" type="checkbox" value="" id="flexSwitchDefault"/&gt;
    &lt;label class="form-check-label" for="flexSwitchDefault"&gt;
        Default switch
    &lt;/label&gt;
&lt;/div&gt;

&lt;label class="form-check form-switch form-check-custom form-check-solid"&gt;
    &lt;input class="form-check-input" type="checkbox" value=""/&gt;
    &lt;span class="form-check-label""&gt;
        Without id linking
    &lt;/span&gt;
&lt;/label&gt;

&lt;div class="form-check form-switch form-check-custom form-check-solid"&gt;
    &lt;input class="form-check-input" type="checkbox" value="" id="flexSwitchChecked" checked="checked" /&gt;
    &lt;label class="form-check-label" for="flexSwitchChecked"&gt;
        Checked switch
    &lt;/label&gt;
&lt;/div&gt;

&lt;div class="form-check form-switch form-check-custom form-check-solid"&gt;
    &lt;input class="form-check-input" type="checkbox" value="" id="flexSwitchDisabled" disabled checked="checked" /&gt;
    &lt;label class="form-check-label" for="flexSwitchDisabled"&gt;
        Disabled switch
    &lt;/label&gt;
&lt;/div&gt;</code>
</pre>
                                                </div>
                                            </div>
                                            <!--end::Highlight-->
                                        </div>
                                        <!--end::Code-->
                                    </div>
                                </div>
                                <!--end::Block-->
                                <!--begin::Block-->
                                <div class="pt-15 pb-5">Use
                                    <a class="fw-bold"
                                        href="../../demo8/dist/documentation/base/utilities#width-and-height.html"
                                        target="_blank">Custom Size Classes</a>&#160; for switches to set custom sizes:
                                </div>
                                <!--end::Block-->
                                <!--begin::Block-->
                                <div class="py-5">
                                    <div class="rounded border p-10">
                                        <div class="mb-10 d-flex">
                                            <div
                                                class="form-check form-switch form-check-custom form-check-solid me-10">
                                                <input class="form-check-input h-20px w-30px" type="checkbox" value=""
                                                    id="flexSwitch20x30" />
                                                <label class="form-check-label" for="flexSwitch20x30">20px x
                                                    30px</label>
                                            </div>
                                            <div
                                                class="form-check form-switch form-check-custom form-check-solid me-10">
                                                <input class="form-check-input h-30px w-50px" type="checkbox" value=""
                                                    id="flexSwitch30x50" />
                                                <label class="form-check-label" for="flexSwitch30x50">30px X
                                                    50px</label>
                                            </div>
                                            <div
                                                class="form-check form-switch form-check-custom form-check-solid me-10">
                                                <input class="form-check-input h-40px w-60px" type="checkbox" value=""
                                                    id="flexSwitch40x60" />
                                                <label class="form-check-label" for="flexSwitch40x60">40px X
                                                    60px</label>
                                            </div>
                                        </div>
                                        <!--begin::Code-->
                                        <div class="py-0">
                                            <!--begin::Highlight-->
                                            <div class="highlight">
                                                <button class="highlight-copy btn" data-bs-toggle="tooltip"
                                                    title="Copy code">copy</button>
                                                <div class="highlight-code">
                                                    <pre class="language-html" style="height:400px">
<code class="language-html">&lt;div class="form-check form-switch form-check-custom form-check-solid me-10"&gt;
    &lt;input class="form-check-input h-20px w-30px" type="checkbox" value="" id="flexSwitch20x30"/&gt;
    &lt;label class="form-check-label" for="flexSwitch20x30"&gt;
        20px x 30px
    &lt;/label&gt;
&lt;/div&gt;

&lt;div class="form-check form-switch form-check-custom form-check-solid me-10"&gt;
    &lt;input class="form-check-input h-30px w-50px" type="checkbox" value="" id="flexSwitch30x50"/&gt;
    &lt;label class="form-check-label" for="flexSwitch30x50"&gt;
        30px X 50px
    &lt;/label&gt;
&lt;/div&gt;

&lt;div class="form-check form-switch form-check-custom form-check-solid me-10"&gt;
    &lt;input class="form-check-input h-40px w-60px" type="checkbox" value="" id="flexSwitch40x60"/&gt;
    &lt;label class="form-check-label" for="flexSwitch40x60"&gt;
        40px X 60px
    &lt;/label&gt;
&lt;/div&gt;</code>
</pre>
                                                </div>
                                            </div>
                                            <!--end::Highlight-->
                                        </div>
                                        <!--end::Code-->
                                    </div>
                                </div>
                                <!--end::Block-->

                                <div class="pt-15 pb-5">Select App Single</div>
                                <div class="py-5">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label for="bookingVia" class="form-label">Select Single</label>
                                            <app-select-single v-model="form.select"
                                                :placeholder="'Placeholder'" :loading="pageStatus == 'option-load'" :options="selectOption"
                                                :show_search="true" :serverside="true" @change-search="getDataOption"
                                                :show_button_clear="true">
                                            </app-select-single>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label for="bookingVia" class="form-label">Select Multiple</label>
                                            <app-select-multiple v-model="form.selectMultiple"
                                                :placeholder="'Placeholder'" :loading="pageStatus == 'option-load'" :options="selectOption"
                                                :show_search="true" :serverside="true" @change-search="getDataOption"
                                                :show_button_clear="true">
                                            </app-select-multiple>
                                        </div>
                                    </div>
                                </div>
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

import Api from "@/services/api";

export default {
    data() {
        return {
            selectOption: [],
            form: {
                select: {},
                selectMultiple: [],
            },
            pageStatus: 'standBy',
        }
    },
    mounted() {
        this.$initializeAppPlugins();
        // this.getDataTable()
    },
    methods: {
        getDataOption(keyword, limit) {
            this.pageStatus = 'option-load';

            let params = {
                search: keyword,
                limit: limit
            }
            Api().get(`${this.$prefix("api")}select-list/roles`, {
                params
            })
                .then(response => {

                    this.selectOption = [];

                    for (let i = 0; i < response.data.data.length; i++) {
                        this.selectOption.push({
                            id: response.data.data[i].id,
                            text: response.data.data[i].name,
                            slug: response.data.data[i].slug
                        });
                    }

                })
                .catch(error => {
                    this.$axiosHandleError(error);
                }).then(() => {
                    this.pageStatus = 'standby';
                })
        }
    }
}
</script>