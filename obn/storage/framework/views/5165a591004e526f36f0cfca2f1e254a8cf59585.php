<!DOCTYPE html>
<html>
  <head>
    <style type="text/css">
      a .yshortcuts:hover {
        background-color: transparent !important;
        border: none !important;
        color: inherit !important
      }
      a .yshortcuts:active {
        background-color: transparent !important;
        border: none !important;
        color: inherit !important
      }
      a .yshortcuts:focus {
        background-color: transparent !important;
        border: none !important;
        color: inherit !important
      }
    </style>
    <style media="only screen and (max-width: 520px)" type="text/css">
      /* /\/\/\/\/\/\/\/\/ RESPONSIVE MOJO /\/\/\/\/\/\/\/\/ */
      /*  must escape media query with double symbol */
      @media  only screen and (max-width: 520px) {
        .main-table {
          width: 90% !important;
        }
        .top {
          padding-top: 33px !important;
          padding-bottom: 37px !important;
        }
        .content {
          padding: 24px 29px !important;
        }
        .verify-button {
          padding: 25px 0 !important;
        }
      }
    </style>
  </head>
  <body align="center" style="margin:0; padding:0; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; background:#ffffff; width:100%; font-family:'Roboto',sans-serif; font-size:16px; text-align:center; line-height:22px; color:#AAB2BA" width="100%">
    <table class="main-table" height="100%" style="border-collapse:collapse !important; mso-table-lspace:0pt; mso-table-rspace:0pt; font-family:'Roboto', sans-serif; padding-left:0; padding-right:0; padding-top:0; padding-bottom:0; margin:20px auto 10px; padding:0; height:100%; width:80%; max-width:600px" width="80%">
      <tr>
        <td align="center" style="border-collapse:collapse !important; mso-table-lspace:0pt; mso-table-rspace:0pt; font-family:'Roboto', sans-serif; padding-left:0; padding-right:0; padding-top:0; padding-bottom:0" valign="top">

          <!-- BODY -->
          <div style="border: 1px solid rgba(223,226,230,0.6); border-radius: 4px; background-image:url(https://d1pgqke3goo8l6.cloudfront.net/DNHYRhpZQ2G5MrcSDPDm_help%20wave%402x.png); background-repeat: no-repeat; background-position: bottom -3px right -3px; background-size: 36%;">
            <table class="container" style="border-collapse:collapse !important; mso-table-lspace:0pt; mso-table-rspace:0pt; font-family:'Roboto', sans-serif; padding-left:0; padding-right:0; padding-top:0; padding-bottom:0; width:100%; max-width:600px; margin:0 auto; padding:0; clear:both" width="100%">
              <tr>
                <td style="border-collapse:collapse !important; mso-table-lspace:0pt; mso-table-rspace:0pt; font-family:'Roboto', sans-serif; padding-left:0; padding-right:0; padding-top:0; padding-bottom:0">
                  <table class="row" style="border-collapse:collapse !important; mso-table-lspace:0pt; mso-table-rspace:0pt; font-family:'Roboto', sans-serif; padding-left:0; padding-right:0; padding-top:0; padding-bottom:0; width:100%" width="100%">
                    <tr>
                      <td class="content" style="border-collapse:collapse !important; mso-table-lspace:0pt; mso-table-rspace:0pt; font-family:'Roboto', sans-serif; padding-top:48px; padding-right:48px; padding-bottom:48px; padding-left:48px">
                        <table class="row" style="border-collapse:collapse !important; mso-table-lspace:0pt; mso-table-rspace:0pt; font-family:'Roboto', sans-serif; padding-left:0; padding-right:0; padding-top:0; padding-bottom:0; width:100%" width="100%">
                          <tr>
                            <td style="border-collapse:collapse !important; mso-table-lspace:0pt; mso-table-rspace:0pt; padding-left:0; padding-right:0; padding-top:0; padding-bottom:0; font-family:'Roboto', sans-serif; font-size:24px; line-height:38px; color:#1B2653">
                              Hey <?php echo e($data['full_name']); ?>

                            </td>
                          </tr>
                          <tr>
                            <td style="border-collapse:collapse !important; mso-table-lspace:0pt; mso-table-rspace:0pt; font-family:'Roboto', sans-serif; padding-left:0; padding-right:0; color:#2A3E52; padding-top:16px; padding-bottom:0px">In order to preserve the security and privacy of your account, please use the code below to complete the <?php echo e($data['process']); ?> verification process.</td>
                          </tr>
                          <tr>
                            <td align="center" style="border-collapse:collapse !important; mso-table-lspace:0pt; mso-table-rspace:0pt; font-family:'Roboto', sans-serif; padding-left:0; padding-right:0; padding-bottom:0; color:#000; font-weight:bold; font-size:24px; padding-top:24px; text-align:center">
                              <?php echo e($data['otp']); ?>

                            </td>
                          </tr>
                          <tr>
                            <td align="center" class="verify-button" style="border-collapse:collapse !important; mso-table-lspace:0pt; mso-table-rspace:0pt; font-family:'Roboto', sans-serif; padding-bottom:35px; padding-right:0px; padding-top:35px; padding-left:0; text-align:center">
                              <a align="center" bgcolor="#4F8DF9" href="#" style="display:inline-block; min-width:100px; background-color:#4F8DF9; border-width:14px; border-style:solid; border-color:#4F8DF9; border-radius:25px; padding:0; font-family:'Roboto', sans-serif; font-size:14px; line-height:16px; font-weight:bold; color:#ffffff !important; text-decoration:none; text-align:center">
                                <span style="display: inline-block; border-left-width: 3px; border-left-style: solid; border-left-color: #4F8DF9; border-right-width: 3px; border-right-style: solid; border-right-color: #4F8DF9; background-color: #4F8DF9; color: #ffffff; min-width: 150px; padding: 0; letter-spacing: 1.1px; text-transform: uppercase;">Verify OTP</span>
                              </a>
                            </td>
                          </tr>
                          <tr>
                            <td style="border-collapse:collapse !important; mso-table-lspace:0pt; mso-table-rspace:0pt; color:#2A3E52; font-family:'Roboto', sans-serif; font-size:16px; line-height:22px; padding-top:0px; padding-right:0px; padding-bottom:26px; padding-left:0">
                              Have a great day, <br />Your team @Federal  Credit West Union Bank
                            </td>
                          </tr>
                          <tr>
                            <td style="border-collapse:collapse !important; mso-table-lspace:0pt; mso-table-rspace:0pt; padding-left:0; padding-top:0; padding-bottom:0; font-family:'Roboto', sans-serif; font-size:14px; line-height:16px; padding-right:80px">
                              Need help? Contact <a href="mailto:support@federalcreditunionbank.com" style="color:#4F8DF9 !important; text-decoration:none" target="_blank">support@federalfirstcapitalunionbank.com</a>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </div>

          <!-- BODY END -->
        </td>
      </tr>
      <tr>
        <td align="center" style="border-collapse:collapse !important; mso-table-lspace:0pt; mso-table-rspace:0pt; font-family:'Roboto', sans-serif; padding-left:0; padding-right:0; text-align:center; padding-top:48px; padding-bottom:35px">
          <table align="center" style="border-collapse:collapse !important; mso-table-lspace:0pt; mso-table-rspace:0pt; font-family:'Roboto', sans-serif; padding-left:0; padding-right:0; padding-top:0; padding-bottom:0; width:100%; max-width:190px; margin:0 auto; text-align:center; padding:0" width="100%">
            <tr>
              <td align="center" height="41" style="border-collapse:collapse !important; mso-table-lspace:0pt; mso-table-rspace:0pt; font-family:'Roboto', sans-serif; padding-left:0; padding-right:0; padding-top:0; padding-bottom:0; text-align:center" width="63">
                <a href="#" style="color:#3999c1 !important; text-decoration:none">
                  <img alt="Twitter" height="auto" src="https://d1pgqke3goo8l6.cloudfront.net/0Xhr5ILS9CynjaZiK4jz_tw%402x.png" style="height:auto; line-height:100%; border:0; outline:none; text-decoration:none" title="SimilarWeb | Twitter" width="41" />
                </a>
              </td>
              
              <td align="center" height="41" style="border-collapse:collapse !important; mso-table-lspace:0pt; mso-table-rspace:0pt; font-family:'Roboto', sans-serif; padding-left:0; padding-right:0; padding-top:0; padding-bottom:0; text-align:center" width="63">
                <a href="#" style="color:#3999c1 !important; text-decoration:none">
                  <img alt="Linkedin" height="auto" src="https://d1pgqke3goo8l6.cloudfront.net/ClLypqwTLehk8wHIC4Y6_linkedin%402x.png" style="height:auto; line-height:100%; border:0; outline:none; text-decoration:none" title="SimilarWeb | Linkedin" width="41" />
                </a>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td align="center" style="border-collapse:collapse !important; mso-table-lspace:0pt; mso-table-rspace:0pt; padding-left:0; padding-right:0; padding-top:0; font-size:14px; text-align:center; font-family:'Roboto', sans-serif; text-align:center; padding-bottom:18px; line-height:16px">
          Feel free to <a href="#" style="color:#AAB2BA !important; text-decoration:none; font-weight:bold" target="_blank">Contact Us</a>
        </td>
      </tr>
      <tr>
        <td align="center" style="border-collapse:collapse !important; mso-table-lspace:0pt; mso-table-rspace:0pt; padding-left:0; padding-right:0; padding-top:0; font-size:14px; font-family:'Roboto', sans-serif; line-height:16px; text-align:center; padding-bottom:80px">
          © Federal First Capital Union Bank LTD 2009-2021. All rights reserved. <br /> 2477 Hog Camp Road Bensenville, Illinois
        </td>
      </tr>
    </table>
  </body>
</html><?php /**PATH /home/federalfirstcapitalunion.com/public_html/obn/resources/views/email/otp.blade.php ENDPATH**/ ?>