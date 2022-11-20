<script>
      var input = document.querySelector("#phone");
      window.intlTelInput(input, {
        separateDialCode: true,
        preferredCountries: ["lk", "us"],
      });
</script>