<script type="text/javascript">
  function searchKampus(id){
    var categoryId = document.getElementById("category").selectedIndex;
    var organizationId = window.location.href.split('/')[5];

    if (typeof(organizationId) !== 'undefined' && categoryId !== 0){
      window.location.replace("/event/"+id+"/"+organizationId+"/"+categoryId);
    }else if (typeof(organizationId) !== 'undefined'){
      window.location.replace("/event/"+id+"/"+organizationId+"/all");
    }else if (categoryId !== 0){
      window.location.replace("/event/"+id+"/all/"+categoryId);
    }else{
      window.location.replace("/event/"+id+"/all/all");
    }
  }

  function searchOrganization(id){
    var categoryId = document.getElementById("category").selectedIndex;
    var campusId = window.location.href.split('/')[4];

    if (typeof(campusId) !== 'undefined' && categoryId !== 0){
      window.location.replace("/event/"+campusId+"/"+id+"/"+categoryId);
    }else if (typeof(campusId) !== 'undefined'){
      window.location.replace("/event/"+campusId+"/"+id+"/all");
    }else if (categoryId !== 0){
      window.location.replace("/event/all/"+id+"/"+categoryId);
    }else{
      window.location.replace("/event/all/"+id+"/all");
    }
  }

  function searchCategory(id){
    var campusId = window.location.href.split('/')[4];
    var organizationId = window.location.href.split('/')[5];

    if (typeof(campusId) !== 'undefined' && typeof(organizationId) !== 'undefined'){
      window.location.replace("/event/"+campusId+"/"+organizationId+"/"+id);
    }else if (typeof(campusId) !== 'undefined'){
      window.location.replace("/event/"+campusId+"/all/"+id);
    }else if (typeof(organizationId) !== 'undefined'){
      window.location.replace("/event/all/"+organizationId+"/"+id);
    }else{
      window.location.replace("/event/all/all/"+id);
    }
  }
</script>
