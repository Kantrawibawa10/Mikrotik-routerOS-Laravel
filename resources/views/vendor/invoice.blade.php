<style type="text/css">
    .card-footer-btn {
        display: flex;
        align-items: center;
        border-top-left-radius: 0 !important;
        border-top-right-radius: 0 !important;
    }

    .text-uppercase-bold-sm {
        text-transform: uppercase !important;
        font-weight: 500 !important;
        letter-spacing: 2px !important;
        font-size: .85rem !important;
    }

    .hover-lift-light {
        transition: box-shadow .25s ease, transform .25s ease, color .25s ease, background-color .15s ease-in;
    }

    .justify-content-center {
        justify-content: center !important;
    }

    .btn-group-lg>.btn,
    .btn-lg {
        padding: 0.8rem 1.85rem;
        font-size: 1.1rem;
        border-radius: 0.3rem;
    }

    .btn-dark {
        color: #fff;
        background-color: #1e2e50;
        border-color: #1e2e50;
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        /* border: 1px solid rgba(30, 46, 80, .09); */
        border: none;
        border-radius: 0.25rem;
        /* box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%); */
    }

    .p-5 {
        padding: 3rem !important;
    }

    .card-body {
        flex: 1 1 auto;
        padding: 1.5rem 1.5rem;
    }

    tbody,
    td,
    tfoot,
    th,
    thead,
    tr {
        border-color: inherit;
        border-style: solid;
        border-width: 0;
    }

    .table td,
    .table th {
        border-bottom: 0;
        border-top: 1px solid #edf2f9;
    }

    .table>:not(caption)>*>* {
        padding: 1rem 1rem;
        background-color: var(--bs-table-bg);
        border-bottom-width: 1px;
        box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
    }

    .px-0 {
        padding-right: 0 !important;
        padding-left: 0 !important;
    }

    .table thead th,
    tbody td,
    tbody th {
        vertical-align: middle;
    }

    tbody,
    td,
    tfoot,
    th,
    thead,
    tr {
        border-color: inherit;
        border-style: solid;
        border-width: 0;
    }

    .mt-5 {
        margin-top: 3rem !important;
    }

    .icon-circle[class*=text-] [fill]:not([fill=none]),
    .icon-circle[class*=text-] svg:not([fill=none]),
    .svg-icon[class*=text-] [fill]:not([fill=none]),
    .svg-icon[class*=text-] svg:not([fill=none]) {
        fill: currentColor !important;
    }

    .svg-icon>svg {
        width: 1.45rem;
        height: 1.45rem;
    }
</style>



<div class="d-flex justify-content-between">
    <div class="col-md-6">
        <h2>
            @if(!$logo_inv)
            <i class="bi bi-image-fill" style="font-size: 100px;"></i>
            @else
            <img src="{{ asset('invoice/'. $logo_inv->value) }}" alt="" width="100">
            @endif
        </h2>
    </div>
    <div class="col-md-6 text-md-end">
        <div class="text-muted mb-2">Status Payment:</div>
        <strong>
            <span class="text-warning">INV Status</span>
        </strong>
    </div>
</div>
<p class="fs-sm">
    Invoice pembayaran paket langganan <strong>{{ $name['value'] ?? 'Tidak ada'}}</strong>
</p>
<div class="border-top border-gray-200 pt-4 mt-4">
    <div class="d-flex justify-content-between">
        <div class="col-md-6">
            <div class="text-muted mb-2">Payment No.</div>
            <strong>#INV-XXXXXXXX</strong>
        </div>
        <div class="col-md-6 text-md-end">
            <div class="text-muted mb-2">Payment Date</div>
            <strong>{{ date('d F Y', strtotime(date('Y-m-d')))}}</strong>
        </div>
    </div>
</div>
<div class="border-top border-gray-200 mt-4 py-4">
    <div class="d-flex justify-content-between">
        <div class="col-md-6">
            <div class="text-muted mb-2">Pelanggan</div>
            <strong>
                Nama Customer
            </strong>
            <p class="fs-sm">
                Alamat Customer
                <br>
                XXXXXXXXXXXX
            </p>
        </div>
        <div class="col-md-6 text-md-end text-end">
            <div class="text-muted mb-2">Payment To</div>
            <strong>
                {{ $name['value'] ?? 'Tidak ada'}}
            </strong>
            <p class="fs-sm">
                {{ $alamat['value'] ?? 'Tidak ada'}}
                <br>
                {{ $phone['value'] ?? 'Tidak ada'}}
            </p>
        </div>
    </div>
</div>
<table class="table border-bottom border-gray-200">
    <thead>
        <tr>
            <th scope="col" class="fs-sm text-dark text-uppercase-bold-sm px-0">Description</th>
            <th scope="col" class="fs-sm text-dark text-uppercase-bold-sm text-end px-0">Amount
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="px-0">Nama Product</td>
            <td class="text-end px-0">@currency(0)</td>
        </tr>
        <tr>
            <td class="px-0">Addons</td>
            <td class="text-end px-0">@currency(0)</td>
        </tr>
    </tbody>
</table>
<div class="mt-2 mb-3">
    <div class="d-flex justify-content-end">
        <p class="text-muted me-3">Subtotal:</p>
        <span>@currency(0)</span>
    </div>
    <div class="d-flex justify-content-end">
        <p class="text-muted me-3">PPN:</p>
        <span>0% (@currency(0))</span>
    </div>
    <div class="d-flex justify-content-end">
        <h5 class="me-3">Total:</h5>
        <h5 class="text-success">@currency(0)</h5>
    </div>
</div>

<div class="">
    <div class="d-flex justify-content-start">
        <article style="font-size: 12px;">
            deskrip yang akan menyesuaikan dengan status invoice customer
        </article>
    </div>
</div>

<p class="text-center text-secondary mt-5 mb-0" style="font-style: italic; font-size: 10px;">NOTE : This is computer
    generated receipt and does not require physical signature.</p>
