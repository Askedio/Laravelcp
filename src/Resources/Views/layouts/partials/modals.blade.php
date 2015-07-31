<!-- search modal dialog -->
<div id="search-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 1041;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">{{ trans('lcp::default.search') }}</h4>
      </div>
      <div class="modal-body">
        <div class="input-group">
          <input type="search" class="form-control search-input" name="q" placeholder="{{ trans('lcp::default.search') }}">
          <div class="input-group-btn">
            <button class="btn btn-primary" type="button"><span class="fa fa-search"></span></button>
          </div>
       </div>
       <br/>
       <div id="site-search-results"></div>				
      </div>
      <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('lcp::default.close') }}</button></div>
    </div>
  </div>
</div>
<script>
  $('.nav-search').on('click', function(e){
    e.preventDefault();    
    $('#search-modal').modal();
  });

  $("#search-modal").on('shown.bs.modal', function() {
    $('.search-input').focus();
  });
  
  $('.search-input').keyup(throttle(function(e){
    var _val=$(this).val();
    if(_val.length < 3){
     $('#site-search-results').html('{{ trans('lcp::errors.minimum', ['min' => 3]) }}');
     return false;
    }
    $('#site-search-results').html('<i class="fa fa-refresh fa-spin fa-2x"></i>');
    $.ajax({
      type: 'GET',
      url:'{{{ URL::to('dashboard/search') }}}/?q='+_val
    }).done(function(msg) {
      if(msg){
        $('#site-search-results').html(msg);
      } else $('#site-search-results').html('<h3>{{ trans('lcp::default.no_results') }}</h3>');
    }).fail(function(jqXHR, textStatus) {
        console.log(jqXHR);
        $('#site-search-results').html('<h3>{{ trans('lcp::default.unable_to_exec') }}</h3>');
    });
  }, 700));
</script>