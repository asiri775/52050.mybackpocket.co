<div class="filter-item">
    <div class="filterinp">
        <div class="form-group form-date-field form-date-search clearfix  has-icon">
            <i class="field-icon icofont-wall-clock"></i>
            <div class="date-wrapper clearfix">
                <div id="reportrange" class="check-in-wrapper d-flex align-items-center">
                    <span>Select Your Dates</span>
                </div>
                <input type="hidden" class="check-in-input" value="{{Request::query('start',display_date(strtotime("today")))}}"   name="start" id="startDateVal">
                <input type="hidden" class="check-out-input" value="{{Request::query('end',display_date(strtotime("+1 day")))}}"  name="end" id="endDateVal">
            </div>
        </div>
    </div>
</div>
