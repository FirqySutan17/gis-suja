<style>
    .pre-posttest h3 {
        font-weight: 700;
        border-bottom: 2px solid #000;
        padding-bottom: 10px;
        margin-bottom: 10px;
    }

    .pre-posttest h4 {
        font-weight: 500;
        font-style: italic
    }

    .qna {
        margin-bottom: 20px
    }

    .qna label {
        font-weight: 500 !important;
    }

    .answer {
        margin-top: 10px
    }

    input {
        display: inline-block;
        vertical-align: middle;
        margin-top: 2px !important;
        margin-right: 8px !important;
    }

    .question {
        font-size: 17px;
        font-weight: 600
    }

    h3.sub-title {
        font-size: 16px;
        text-decoration: none;
        margin-top: 10px;
        /* margin-bottom: 20px; */
        border-bottom: 1px solid #000;
        text-transform: uppercase;
        font-weight: 700;
        padding-bottom: 15px;
        font-size: 14px !important;
    }

    .box-att {
        background: #007bff;
        color: #fff;
        padding: 20px;
        border-radius: 10px
    }

    .divi-delayed-button-2 {
        text-align: center;
        padding: 15px;
        font-weight: 800;
        font-size: 18px;
        border: none;
        /* border-top-right-radius: 10px; */
        background: #007bff;
        color: #fff;
        border-radius: 8px;
        margin-bottom: 20px
    }

    .divi-delayed-button-2:hover {
        background: #58a9ff
    }

    .content-task {
        /* border-top: 1px solid #000;
        border-bottom: 1px solid #000; */
        /* margin-bottom: 10px; */
        margin-top: 15px !important;
        border-bottom: 1px solid #000;
    }

    .answer {
        margin-left: 25px;
        display: flex;
        justify-content: left;
        align-content: center;
    }

    [type="checkbox"],
    [type="radio"] {
        width: 15px !important;
    }

    @media(max-width: 600px) {
        .answer {
            margin-left: 0px
        }

        input {
            margin-right: 10px !important
        }

        [type="checkbox"],
        [type="radio"] {
            width: 30px !important;
        }

        .question {
            line-height: 25px;
            font-size: 18px
        }
    }
</style>

<style>
    table.dataTable th {
        position: relative;
        text-align: center
    }

    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_desc:after,
    table.dataTable thead .sorting_asc_disabled:after,
    table.dataTable thead .sorting_desc_disabled:after {
        position: absolute;
        bottom: 5px;
        right: 5px;
    }

    table.dataTable thead>tr>th.sorting_asc,
    table.dataTable thead>tr>th.sorting_desc,
    table.dataTable thead>tr>th.sorting,
    table.dataTable thead>tr>td.sorting_asc,
    table.dataTable thead>tr>td.sorting_desc,
    table.dataTable thead>tr>td.sorting {
        padding: 10px 20px;
    }

    .table>tbody>tr>td,
    .table>tbody>tr>th,
    .table>tfoot>tr>td,
    .table>tfoot>tr>th,
    .table>thead>tr>td,
    .table>thead>tr>th {
        vertical-align: middle;
    }

    select.input-sm {
        height: 40px;
        line-height: 30px;
        text-align: center;
    }

    .box-header {
        background: #3c8dbc;
        border: 4px solid #000;
        border-radius: 10px 10px 0px 0px;
        padding: 25px 0px;
    }

    .box.box-solid.box-primary {
        border-top: none;
        border: 0px solid transparent
    }

    .box-title {
        font-size: 24px;
        font-weight: 700;
        text-transform: uppercase;
        color: #fff;
    }

    .box.box-info {
        border-top-color: transparent;
    }

    .content {
        padding: 0px
    }

    .date-range {
        background-color: #000;
        color: #fff;
        text-align: center;
        width: 100%;
        padding: 8px 16px;
        border-radius: 0px 0px 10px 10px;
        border: 2px solid #000;
        font-weight: 600
    }

    .box-header.with-border {
        border-bottom: 1px solid #f4f4f4;
    }

    .b-style {
        font-family: cjFont;
        font-size: 14px;
        color: #0f172a;
        margin-bottom: 0px;
        background: transparent;
        padding: 0px;
        padding-top: 5px
    }

    table.table-bordered.dataTable th, table.table-bordered.dataTable td {
        font-size: 10px !important
    }

    table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:after {
        bottom: 10px !important;
    }

    select.input-sm {
        height: 30px;
        line-height: 20px;
        margin: 0px 5px
    }

    div.dataTables_wrapper div.dataTables_length select {
        width: 50px;
    }
    div.dataTables_wrapper div.dataTables_info {
        padding-top: 8px;
        white-space: nowrap;
        font-size: 10px !important;
    }
    .pagination>.disabled>a, .pagination>.disabled>a:focus, .pagination>.disabled>a:hover, .pagination>.disabled>span, .pagination>.disabled>span:focus, .pagination>.disabled>span:hover {
        font-size: 11px
    }
    .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
        font-size: 11px;
    }
    div.dataTables_wrapper div.dataTables_length label {
        font-size: 11px;
    }
    td {
        height: auto;
        padding: 10px !important
    }
    div.dataTables_wrapper div.dataTables_filter label {
        font-weight: normal;
        white-space: nowrap;
        text-align: left;
        font-size: 11px;
        display: inline-block;
        vertical-align: middle;
    }
    .pagination>li>a, .pagination>li>span {
        position: relative;
        float: left;
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.42857143;
        color: #337ab7;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd;
        font-size: 11px;
    }
    .table-responsive {
        width: 100%
    }
    .table-w-message {
        width: 1330px;
    }
    .c-form {
        max-width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .cust-btn-back {
        color: red;
        border: 1px solid red;
        background: #fff;
    }
    .cust-btn-back:hover {
        background: red;
        color: #fff;
        border: 1px solid red;
    }
    .row {
        margin: 0px !important;
    }
    #customerdetail td {
        background-color: #eee;
    }

    th, td {
        font-size: 10px !important;
        text-align: center;
    }
    input {
        font-size: 12px !important;
        text-align: center;
    }
    .wrapper-reason {
        display: grid;
        grid-template-columns: repeat(8, 1fr);
        width: 100%;
    }
    .wrapper-reason .col-item {
        grid-column: span 4;
    }
    .cust-btn-add {
        background: green;
        color: #fff;
        width: 120px;
        padding: 5px;
        border: 1px solid transparent;
        font-weight: 700
    }
    .cust-btn-add:hover {
        border: 1px solid green;
    }
    .select2-container .select2-selection--single .select2-selection__rendered {
        font-size: 13px !important;
        margin-top: 3px !important;
    }
    .select2-container--bootstrap4 .select2-results__option {
        font-size: 12px
    }

    .maps-frame {
        border:2px solid #C1C1C1; 
        border-radius: 10px;
        width: 100%;
        height: 350px;
    }

    @media (max-width: 1024px) {
        #region_entry {
            margin-bottom: 20px
        }
        .wrapper-reason .col-item {
            grid-column: span 8;
        }
        h3.sub-title {
            line-height: 25px;
        }
    }
</style>
<style>
    .pre-posttest h3 {
        font-weight: 700;
        border-bottom: 2px solid #000;
        padding-bottom: 10px;
        margin-bottom: 10px;
    }

    .pre-posttest h4 {
        font-weight: 500;
        font-style: italic
    }

    .qna {
        margin-bottom: 20px
    }

    .qna label {
        font-weight: 500 !important;
    }

    .answer {
        margin-top: 10px
    }

    input {
        display: inline-block;
        vertical-align: middle;
        margin-top: 2px !important;
        margin-right: 8px !important;
    }

    .question {
        font-size: 17px;
        font-weight: 600
    }

    h3.sub-title {
        font-size: 16px;
        text-decoration: none;
        margin-top: 10px;
        /* margin-bottom: 20px; */
        border-bottom: 1px solid #000;
        text-transform: uppercase;
        font-weight: 700;
        padding-bottom: 15px;
        font-size: 14px !important;
    }

    .box-att {
        background: #007bff;
        color: #fff;
        padding: 20px;
        border-radius: 10px
    }

    .divi-delayed-button-2 {
        text-align: center;
        padding: 15px;
        font-weight: 800;
        font-size: 18px;
        border: none;
        /* border-top-right-radius: 10px; */
        background: #007bff;
        color: #fff;
        border-radius: 8px;
        margin-bottom: 20px
    }

    .divi-delayed-button-2:hover {
        background: #58a9ff
    }

    .content-task {
        /* border-top: 1px solid #000;
        border-bottom: 1px solid #000; */
        /* margin-bottom: 10px; */
        margin-top: 15px !important;
        border-bottom: 1px solid #000;
    }

    .answer {
        margin-left: 25px;
        display: flex;
        justify-content: left;
        align-content: center;
    }

    [type="checkbox"],
    [type="radio"] {
        width: 15px !important;
    }

    .text-mobile {
        display: none;
    }

    
</style>

<style>
    table.dataTable th {
        position: relative;
        text-align: center
    }

    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_desc:after,
    table.dataTable thead .sorting_asc_disabled:after,
    table.dataTable thead .sorting_desc_disabled:after {
        position: absolute;
        bottom: 5px;
        right: 5px;
    }

    table.dataTable thead>tr>th.sorting_asc,
    table.dataTable thead>tr>th.sorting_desc,
    table.dataTable thead>tr>th.sorting,
    table.dataTable thead>tr>td.sorting_asc,
    table.dataTable thead>tr>td.sorting_desc,
    table.dataTable thead>tr>td.sorting {
        padding: 10px 20px;
    }

    .table>tbody>tr>td,
    .table>tbody>tr>th,
    .table>tfoot>tr>td,
    .table>tfoot>tr>th,
    .table>thead>tr>td,
    .table>thead>tr>th {
        vertical-align: middle;
    }

    select.input-sm {
        height: 40px;
        line-height: 30px;
        text-align: center;
    }

    .box-header {
        background: #3c8dbc;
        border: 4px solid #000;
        border-radius: 10px 10px 0px 0px;
        padding: 25px 0px;
    }

    .box.box-solid.box-primary {
        border-top: none;
        border: 0px solid transparent
    }

    .box-title {
        font-size: 24px;
        font-weight: 700;
        text-transform: uppercase;
        color: #fff;
    }

    .box.box-info {
        border-top-color: transparent;
    }

    .content {
        padding: 0px
    }

    .date-range {
        background-color: #000;
        color: #fff;
        text-align: center;
        width: 100%;
        padding: 8px 16px;
        border-radius: 0px 0px 10px 10px;
        border: 2px solid #000;
        font-weight: 600
    }

    .box-header.with-border {
        border-bottom: 1px solid #f4f4f4;
    }

    .b-style {
        font-family: cjFont;
        font-size: 14px;
        color: #0f172a;
        margin-bottom: 0px;
        background: transparent;
        padding: 0px;
        padding-top: 5px
    }

    table.table-bordered.dataTable th, table.table-bordered.dataTable td {
        font-size: 10px !important
    }

    table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:after {
        bottom: 10px !important;
    }

    select.input-sm {
        height: 30px;
        line-height: 20px;
        margin: 0px 5px
    }

    div.dataTables_wrapper div.dataTables_length select {
        width: 50px;
    }
    div.dataTables_wrapper div.dataTables_info {
        padding-top: 8px;
        white-space: nowrap;
        font-size: 10px !important;
    }
    .pagination>.disabled>a, .pagination>.disabled>a:focus, .pagination>.disabled>a:hover, .pagination>.disabled>span, .pagination>.disabled>span:focus, .pagination>.disabled>span:hover {
        font-size: 11px
    }
    .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
        font-size: 11px;
    }
    div.dataTables_wrapper div.dataTables_length label {
        font-size: 11px;
    }
    td {
        height: auto;
        padding: 10px !important
    }
    div.dataTables_wrapper div.dataTables_filter label {
        font-weight: normal;
        white-space: nowrap;
        text-align: left;
        font-size: 11px;
        display: inline-block;
        vertical-align: middle;
    }
    .pagination>li>a, .pagination>li>span {
        position: relative;
        float: left;
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.42857143;
        color: #337ab7;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd;
        font-size: 11px;
    }
    .table-responsive {
        width: 100%
    }
    .table-w-message {
        width: 1330px;
    }
    .c-form {
        max-width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .cust-btn-back {
        color: red;
        border: 1px solid red;
        background: #fff;
    }
    .cust-btn-back:hover {
        background: red;
        color: #fff;
        border: 1px solid red;
    }
    .row {
        margin: 0px !important;
    }
    #customerdetail td {
        background-color: #eee;
    }

    th, td {
        font-size: 10px !important;
        text-align: center;
    }
    input {
        font-size: 12px !important;
        text-align: center;
    }
    .wrapper-reason {
        display: grid;
        grid-template-columns: repeat(8, 1fr);
        width: 100%;
    }
    .wrapper-reason .col-item {
        grid-column: span 4;
    }
    .cust-btn-add {
        background: green;
        color: #fff;
        width: 120px;
        padding: 5px;
        border: 1px solid transparent;
        font-weight: 700
    }
    .cust-btn-add:hover {
        border: 1px solid green;
    }
    .select2-container .select2-selection--single .select2-selection__rendered {
        font-size: 12px !important;
        margin-top: 3px !important;
    }
    .select2-container--bootstrap4 .select2-results__option {
        font-size: 12px
    }

    #customersinfo .cust-btn-add {
        display: none;
    }
    #segment .cust-btn-add {
        display: none;
    }
    #marketprice .cust-btn-add {
        display: none;
    }
    #visitimages .cust-btn-add {
        display: none;
    }
    .w-25 {
        width: 25% !important;
    }
    textarea {
        min-height: 115px;
        overflow: auto;
    }
    .th-mobile {
        display: none;
    }
    .select2-container--bootstrap4 .select2-selection--single {
        height: 35px !important;
    }

    @media (max-width: 1024px) {
        #region_entry {
            margin-bottom: 20px
        }
        .wrapper-reason .col-item {
            grid-column: span 8;
        }
        h3.sub-title {
            line-height: 25px;
        }
    }

    @media(max-width: 600px) {
        .th-mobile {
            display: block;
        }
        .w-25 {
            width: 100% !important;
        }
        .w-25 textarea {
            min-height: 115px;
            overflow: auto;
        }
        .answer {
            margin-left: 0px
        }

        input {
            margin-right: 10px !important
        }
        input[type=date].form-control, input[type=time].form-control, input[type=datetime-local].form-control, input[type=month].form-control {
            line-height: 20px;
        }

        [type="checkbox"],
        [type="radio"] {
            width: 30px !important;
        }

        .question {
            line-height: 25px;
            font-size: 18px
        }
        table thead {
            display: none;
        }
        table, table tbody, table tr, table td {
            display: flex;
            flex-direction: column;
            width: 100%;
        } 
        th, td {
            font-size: 12px !important;
            text-align: center;
        }
        table tbody tr td {
            text-align: center;
            padding-left: 50%;
            position: relative;
            white-space: normal !important;
            font-size: 12px !important;

        }
        input {
            font-size: 14px !important;
        }
        select {
            font-size: 12px !important;
        }
        textarea {
            font-size: 12px !important;
        }
        table td:before {
            content: attr(data-label);
            width: 100%;
            font-weight: 600;
            font-size: 13px;
            text-align: left;
            text-transform: uppercase;
            margin-bottom: 5px;
        } 
        .ts-asm {
            display: none;
        }
        .h-it {
            height: auto !important;
        }
        .text-desktop {
            display: none;
        }
        .text-mobile {
            display: block;
            font-size: 14px !important;
            font-weight: 600;
            text-transform: uppercase;
            padding: 15px 0px;
            vertical-align: middle !important;
        }
        th {
            height: auto !important;
            padding: 15px !important;
        }
        #customersinfo .cust-btn-add {
            display: block;
        }
        #segment .cust-btn-add {
            display: block;
        }
        #marketprice .cust-btn-add {
            display: block;
        }
        #visitimages .cust-btn-add {
            display: block;
        }
        .select2-container .select2-selection--single .select2-selection__rendered {
            font-size: 14px !important;
        }
        .select2-container--bootstrap4 .select2-selection--single {
            height: calc(2.5em + .75rem + 2px) !important;
        }
        .btn-group-sm>.btn, .btn-sm {
            font-size: 18px !important;
        }
        .btn.cust-btn-add {
            width: 100%;
            font-size: 22px;
            padding: 10px;
        }
        .th-mobile {
            width: 100%
        }
    }
</style>

<div class="main-content pre-posttest">
    <h3 class="card-title">
        <strong>GIS - SITE</strong>
    </h3>
    <div class="row">
        <form action="<?= base_url('dashboard/gis/site/update') ?>" method="POST" enctype="multipart/form-data">
            <div class="content-task mt-5">
                    <div class="table-responsive">
                        <input type="hidden" name="id" value="<?= isset($site['ID']) ? $site['ID'] : '' ?>">
                        <table class="table table-bordered" style="margin-bottom: 20px">
                            <thead>
                                <tr>
                                    <th style="text-align: left" width="33,333%">REGION</th>
                                    <th style="text-align: left" width="33,333%">CITY</th>
                                    <th style="text-align: left" width="33,333%">CLASS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-label="REGION">
                                        <select id="region" class="form-control region-select" style="width: 100%;" name="region" required>
                                            <option value="<?= $site['REGION'] ?>"><?= $site['REGION'] ?></option>
                                            <option value="JAVA">JAVA</option>
                                            <option value="JAWA & SUMATRA">JAWA & SUMATRA</option>
                                            <option value="BALI">BALI</option>
                                            <option value="KALIMANTAN">KALIMANTAN</option>
                                            <option value="SUMATRA">SUMATRA</option>
                                        </select>
                                    </td> 
                                    <td data-label="CITY">
                                        <select id="city" class="form-control city-select" style="width: 100%;" name="city" required>
                                            <option value="<?= $site['CITY'] ?>"><?= $site['CITY'] ?></option>
                                            <option value="BANDUNG">BANDUNG</option>
                                            <option value="TASIKMALAYA">TASIKMALAYA</option>
                                            <option value="JOMBANG">JOMBANG</option>
                                            <option value="BOGOR">BOGOR</option>
                                            <option value="SUKABUMI">SUKABUMI</option>
                                        </select>
                                    </td> 
                                    <td data-label="CLASS">
                                        <select id="class" class="form-control class-select" style="width: 100%;" name="class" required>
                                            <option value="<?= $site['CLASS'] ?>"><?= $site['CLASS'] ?></option>
                                            <option value="GPS">GPS</option>
                                            <option value="PS">PS</option>
                                            <option value="BROILER">BROILER</option>
                                            <option value="HATCHERY">HATCHERY</option>
                                            <option value="LAB">LAB</option>
                                            <option value="MEAT CENTER">MEAT CENTER</option>
                                            <option value="RPA">RPA</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered" style="margin-bottom: 20px">
                            <thead>
                                <tr>
                                    <th style="text-align: left" width="50%">OWNERSHIP</th>
                                    <th style="text-align: left" width="50%">SITE NAME</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-label="OWNERSHIP">
                                        <select id="owner" class="form-control owner-select" style="width: 100%;" SITE NAME="owner" required>
                                            <option value="<?= $site['OWNERSHIP'] ?>"><?= $site['OWNERSHIP'] ?></option>
                                            <option value="JV (CJ PIA)">JV (CJ PIA)</option>
                                            <option value="KEMITRAAN">KEMITRAAN</option>
                                            <option value="OWN (SUJA)">OWN (SUJA)</option>
                                            <option value="SEWA">SEWA</option>
                                        </select>
                                    </td> 
                                    <td data-label="NAME">
                                        <input type="text" name="name" value="<?= $site['NAME'] ?>" class="form-control" style="font-size: 14px;" placeholder="CTH : FARM GPS JAKARTA" />
                                    </td> 
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered" style="margin-bottom: 20px">
                            <thead>
                                <tr>
                                    <th style="text-align: left" width="50%">LOCATION</th>
                                    <th style="text-align: left" width="50%">CAPACITY</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-label="LOCATION" style="padding-top: 20px !important">
                                        <a href="javascript:void(0)" onclick="getLocat(this)" style="background: #00c0ff; border-radius: 10px; color: #fff; font-weight: 600; padding: 10px;margin-top: 10px">UPDATE LOCATION</a>
                                        <input type="text" value="<?= $site['COORDINATE'] ?>" name="coordinate" class="form-control" placeholder="COODINATE"  style="font-size: 14px; width: 100%; margin-top: 15px !important" />
                                        <textarea name="address" class="form-control" rows="5" placeholder="ADDRESS" style="margin-top:10px; text-transform: uppercase;padding: 10px; font-size: 13px !important"><?= $site['ADDRESS'] ?></textarea>
                                    </td> 
                                    <td data-label="CAPACITY">
                                        <input type="number" value="<?= $site['CAPACITY'] ?>" name="capacity" class="form-control" style="font-size: 13px !important;" placeholder="CTH : 54.000" />
                                    </td> 
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered" style="margin-bottom: 20px">
                            <thead>
                                <tr>
                                    <th style="text-align: left" width="100%">LINK GMAPS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-label="LINK GMAPS">
                                        <input type="text" name="link_gmaps" class="form-control" style="font-size: 13px !important; text-transform: uppercase" placeholder="HTTPS://GMAPS.COM" value="<?= $site['LINK_GMAPS'] ?>" />
                                    </td> 
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>

            <div class="form-group row mt-5" style="margin: 20px 0px !important">
                <div class="col-lg-12 col-sm-12" style="display: flex; padding: 0px">
                    <a href="<?= admin_url('gis/site') ?>" class="btn btn-primary cust-btn-back" style="width: 50%; height: 50px; display: flex; align-items: center; justify-content: center;">CANCEL</a>
                    <span style="margin: 5px;"></span>
                    <button type="submit" class="btn btn-primary cust-btn-save" style="width: 50%; height: 50px">SAVE</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLUc8QC0GYh5ozbMbGBcNUm1BBIjvmmg8&callback=myMap"></script> -->
<script>
    $('#region').select2({
        theme: 'bootstrap4',
        language: "en",
        placeholder: "- SELECT REGION -",
    });

    $('#city').select2({
        theme: 'bootstrap4',
        language: "en",
        placeholder: "- SELECT CITY -",
    });

    $('#class').select2({
        theme: 'bootstrap4',
        language: "en",
        placeholder: "- SELECT CLASS -",
    });

    $('#owner').select2({
        theme: 'bootstrap4',
        language: "en",
        placeholder: "- SELECT OWNERSHIP -",
    });

    function getLocat(button) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;
                const coordinate = latitude + ", " + longitude;

                // Ambil parent row dari tombol yang diklik
                const row = button.closest('tr');

                // Set nilai koordinat
                const coordinateInput = row.querySelector('input[name="coordinate"]');
                if (coordinateInput) coordinateInput.value = coordinate;

                // Set nilai address (hasil reverse geocode)
                detailPosition(latitude, longitude, function(address) {
                    const addressTextarea = row.querySelector('textarea[name="address');
                    if (addressTextarea) addressTextarea.value = address;
                });

            }, function(error) {
                alert("Gagal mendapatkan lokasi: " + error.message);
            });
        } else {
            alert("Geolocation tidak didukung browser ini.");
        }
    }
    $(document).ready(function() {
        getLocat();
    });

    function showPosition(position) {
        let latitude    = position.coords.latitude;
        let longitude   = position.coords.longitude;
            
        $("#coordinate").val(coordinate);
        
        detailPosition(latitude, longitude)
    }

    function detailPosition(latitude, longitude, callback) {
        const addressAPI = `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${latitude}&lon=${longitude}`;
        $.ajax({
            url: addressAPI,
            type: "GET",
            success: function(response) {
                const address = response.display_name;
                if (typeof callback === 'function') {
                    callback(address);
                }
            },
            error: function() {
                alert("Gagal mengambil alamat dari koordinat.");
            }
        });
    }
</script>