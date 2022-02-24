( function( $ ) {
  const publicData = {
    advDiagBootstrap: "https://be50-2405-8d40-c80-5d2a-4457-a1c6-80b3-7d5.ngrok.io/assets/css/adv--diag-bs.css",
    advDiagStyle: "https://be50-2405-8d40-c80-5d2a-4457-a1c6-80b3-7d5.ngrok.io/assets/css/adv-diag.css",
    fileName: "adv-diag.js",
    businessVerified: false
  }

  const config = {
    /**
     * @description Initialize functions
     */
    init: function() {
      if ( this.isCartPage() ) {
        console.log( `File Name: ${publicData.fileName}` )

        this.addStyle()
        this.hideCheckout()
        this.createForm()
        this.events()
      }
    },

    /**
     * @description Initialize style to Storefront
     */
    addStyle: function() {
      const bs = `<link href="${publicData.advDiagBootstrap}" rel="stylesheet" type="text/css" media="all" />`
      const style = `<link href="${publicData.advDiagStyle}" rel="stylesheet" type="text/css" media="all" />`
      $( 'head' ).append( bs )
      $( 'head' ).append( style )
    },

    /**
     * @description Hide checkout buttons
     */
    hideCheckout: function() {
      const hideCss = {
        "opacity": "0",
        "position": "absolute",
        "left": "-999999px",
        "top": "-999999px",
        "z-index": "-999999"
      }
      $( '#checkout' ).css( hideCss )
    },

    /**
     * @description Initilize the HTML Business ID Form
     */
    createForm: function() {
      const businessForm = `
        <div class="adv--diag">
          <div class="form-group row">
            <h3>[Business ID Form]</h3>
          </div>
        </div>
      `

      $( businessForm ).insertAfter( '.cart__blocks .cart__ctas' )
    },

    /**
     * @description Initialize DOM events
     */
    events: function() {
      // 
    },

    /**
     * @description Check if page is Cart page then initialize events/triggers
     */
    isCartPage: function() {
      const pathname = window.location.pathname

      if ( pathname == '/cart' ) return true
      return false
    }
  }

  $( document ).ready( function() {
    config.init()
  } )

} )( jQuery )