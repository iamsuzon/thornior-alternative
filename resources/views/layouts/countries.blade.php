<select class="form-control" id="region" name="region" required>
    <option value="">Select Country</option>
    @if(isset($bloggerData['region']) AND $bloggerData['region'] != null)
        <option value="{{$bloggerData['region']->code}}" selected style="background-color: #4aa0e6;color: #fff">{{$bloggerData['region']->name}}</option>
    @endif
    @foreach($countries as $country)
        <option value="{{$country->code}}">{{$country->name}}</option>
    @endforeach
</select>
