<if-type>

  <div if={matches()}>
    <yield />
  </div>

  <script type="text/javascript">
    var tag = this;
    var categories = {
      '01.01': 'article-special',
      '01.02': 'article',
      '01.10': 'article',
      '01.15': 'article',
      '01.05': 'book_part',
      '01.11': 'book_part',
      '01.07': 'boot_part',

      '01.03': 'independent',
      '01.04': 'independent',
      '01.14': 'independent',
      '09.10': 'independent',
      '09.11': 'independent',
      '09.12': 'independent',
      '01.13': 'independent'
    }

    tag.on('mount', function(event) {
      igb.bus.on('type-selected', handler);
      handler()
    })

    tag.matches = function() {
      // console.log(categories[igb.currentType], tag.opts.category);
      // console.log(categories[igb.currentType] == tag.opts.category);
      // console.log(!tag.opts.except || !tag.opts.except.match(igb.currentType));
      // console.log(
      //   (categories[igb.currentType] == tag.opts.category) &&
      //   (!tag.opts.except || !tag.opts.except.match(igb.currentType))
      // );
      if (tag.opts.category) {
        return (
          (categories[igb.currentType] == tag.opts.category) &&
          (!tag.opts.except || !tag.opts.except.match(igb.currentType))
        )
      }

      if (tag.opts.tow) {
        return igb.currentType == tag.opts.tow;
      }

      if (tag.opts.except) {
        return igb.currentType != tag.opts.except;
      }
    }
    
    handler = function() {
      // console.log('HANDLING');
      var inputs = $(tag.root).find('input, textarea, select');
      if (tag.matches()) {
        inputs.prop('disabled', false);
      } else {
        inputs.prop('disabled', true);
      }

      tag.update();
    }


  </script>

</if-type>