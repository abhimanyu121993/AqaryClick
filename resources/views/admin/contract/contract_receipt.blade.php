<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Receipt</title>
</head>

<body>
  <center><button type="button" class="btn btn-lg btn-outline-danger mt-2" id="download">Download Report</button></a>
  </center>
<div id="contract-download">
  <h1 class="text-center">Lease Agreement (عقد الإيجار)</h1>
  <div class="container">
    <div class="row">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Contract No:{{$conn->contract_code }}<br>
              Customer No:{{Auth::user()->customer_code??'' }}</th>
            <th class="text-right">RE / HTC / 0005:رقم العقد <br>
              MU / HTC / 015: رقم العميل </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <p>This LEASE AGREEMENT is made as of {{\Carbon\Carbon::parse($conn->created_at)->format('d F Y')}} by and between the following Parties</p><br><b>1. First Party <br>
                {{ $conn->ownerDetails->first_name??'' }} </b><br>
              QID: 265235158985
              P.O. Box :{{ $conn->ownerDetails->pincode??'' }} , {{ $conn->ownerDetails->address??'' }}<br>
              Phone: {{ $conn->ownerDetails->phone??'' }}<br>
              Email:{{ $conn->ownerDetails->email??'' }}<br>
              Hereinafter referred to as (<b>The Lessor</b>)<br>
              <b class="text-center">And</b><br>
              <b>2. Second Party <br>
                M/s, /Mr. {{ $conn->tenantDetails->tenant_english_name??'' }} C. R. No ({{ $conn->contract_code??'' }})</b><br>
              Represented by:<br>
              Mr:{{ $conn->lessorDetails->first_name??'' }}<br>
              QID: 265235158985
              P.O. Box :{{ $conn->tenantDetails->post_office??'' }} , {{ $conn->tenantDetails->unit_address??'' }}<br>
              phone1:{{ $conn->tenantDetails->tenant_primary_mobile??'' }} , phone2:{{ $conn->tenantDetails->tenant_secondary_mobile??'' }} <br>
              Email:{{ $conn->tenantDetails->email??'' }}<br>
              Hereinafter referred to as (<b>The Lessor</b> )

            </td>
            <td>Contract No:RE/HTC/0005<br>
              Customer No:MU/HTC/015</td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">Preamble</h3>
              <p>WHEREAS, the First Party (The Lessor) owns building No (60976), PIN No.
                (13270020), located in the Msheireb area, which consists of commercial
                Shops.</p>
              <p>WHEREAS, the Second Party (The Lessee) wishes to rent Shop No. (15) from
                the building as mentioned above.</p>
              <p>NOW THEREFORE, in consideration of the preceding, the First Party leased
                to the Second Party the abovementioned leased premises as per following
                terms and conditions:</p>
            </td>
            <td>
              <h3>
                <center><input type="text" name="" id=""></center>
                "المقدمة "
              </h3>
              <p>حيث يمتلك الطرف الأول (المؤجر) مبنى رقم (60976) رقم التعريف الشخصي.
                (13270020) الواقعة في منطقة مشيرب والتي تتكون من منطقة تجارية
                محلات.</p>
            </td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause One”</h3>
              <p>The preamble to this Agreement and its appendix shall form an integral
                part hereof and will be read together with the other articles of this Lease
                Agreement.</p>
            </td>
            <td></td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Two”</h3>
              <p>Both Parties have agreed that their addresses, as set out in the preamble
                above, are the considered addresses for serving and delivering legal
                notifications and correspondence pertaining to this Agreement. Either party
                may change its address by written notice to the other party of such change.</p>
            </td>
            <td></td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Three”</h3>
              <p>A) Both Parties have agreed that the Lease term is (5) five years
                only, starting on 1/10/2022 and ending on 30/9/2027; there shall
                be a grace period of two months, commencing on 1/10/2022 until
                31/1/2023, This Contract shall be considered a fixed Lease; however, it
                might be renewed upon Lessor's approval.</p>
              <p>B) The Lessee may terminate this Agreement before the expiration date and
                after completing the Second year; by serving a written notice to the Lessor
                before a month of such termination; in that case, The Lessee shall pay the
                rent of Four months as consensual compensation, in addition to the
                Lessee’s obligation to return the premises as clarified in clause Eight from
                this Agreement</p>
              <p>C) If Lessee, with Lessor’s prior written notice to renew the contract with
                new terms and conditions, remains in possession of the Premises after the
                expiration date of this Agreement and without signing a new contract, in
                that case, this Lease Agreement shall be renewed with the same terms and
                conditions as stipulated on the said notice</p>

            </td>
            <td></td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Four”</h3>
              <p>The Parties agree that the monthly rent amounts to (QAR……….) to be
                paid in advance by acceptable bank cheques starting from each of the first
                calendar months. Upon signing this contract, the lessee shall hand over to
                the lessor (24) Cheques for the first two years from the entire duration of
                this Lease, each equivalent to (QAR…….)</p>
              <p>In addition to that, the Lessee and upon the expiration of the second year
                shall hand over to the Lessor a number of (36) cheques for the remaining
                rental period of five years, if the Lessee fails to do so then the Lessee shall
                pay to the Lessor an amount of (QAR1,000) for each day of delay as a
                consensual compensation and the rental value without prejudice to the
                Lessor’s right to terminate this Agreement</p>
            </td>
            <td></td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Five”</h3>
              <p>A) Upon signing this Agreement, the Lessee shall deliver to the Lessor a
                cheque equivalent to (QAR19,000) "Nineteen Thousand Qatari Riyal." as a
                security deposit to recover any damages or maintenance need to be
                implemented in the premises to return it in the same condition as
                received. In addition to Leese's obligation to pay any reinstatement costs
                and damages that are higher than the value of the Security cheque as well
                as any dues entitled to the Lessor resulting from this Lease</p>
              <p>B) The security cheque shall be returned to the Lessee upon the expiry
                date of this Agreement and return the rented premises in the same
                condition as received and after submission clearance from kahrama.
              </p>
            </td>
            <td></td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Six”</h3>
              <p>Both parties have agreed that the purpose of the Lease is to use the
                premises as a (………). The lessee shall not change the purpose of the
                Lease during this Contract; failing to do so shall give the Lessor the
                right to terminate the Contract without prior notice and claim the
                remaining rental period</p>
            </td>
            <td></td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Seven”</h3>
              <p>During the term of this lease, The Lessee shall keep and maintain the entire
                premises in good order and repair and shall use the leased premises in
                accordance with the terms and conditions agreed upon and for the purpose,
                the said premises are intended.</p>
              <p>The Lessee shall not change/ alert to the rented premises without the
                Lessor's prior written consent. If such change has already been affected, the
                Lessor may use the Security cheque as clarified in clause (5) hereabove and
                keep the change implemented by the Lessee without any liability of the
                Lessor without prejudice to the Lessor's right to claim compensation for
                such breach.</p>
            </td>
            <td></td>
          </tr>

          <tr>
            <td>
              <h3 class="text-center">“Clause Eight”</h3>
              <p>Upon the expiry date of the lease, the Lessee shall deliver the premises
                and its annexes and return the premises in the same good conditions as
                received; however, such delivery shall not take place unless the Lessee
                commits to doing the following</p>
              <p>1- Fulfill all Lessee's obligations resulting from this Agreement, including
                but not limited to paying the rental value or any other dues.
                2- Submit clearance from Kahrama.
                3- Submit proof of revocation of the commercial licenses that the Lessee
                has issued.
                4- Remove all property brought by the Lessee to the Premises.
                5- To sign on a written handover-takeover report.</p>
              <p>If the Lessee fails to perform any of the abovementioned obligations, the
                Lessee shall remain liable to pay the rent till the said obligations have been
                fulfilled.</p>
            </td>
            <td></td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Nine”</h3>
              <p>Upon execution of this Agreement, the Lessee shall carry out the periodic
                maintenance and necessary repairs as applicable by practice, which is not
                limited to (Civil Defense, Paint, Replacement, Repairs of locks, Basins, Tiles,
                Motor repairs, water tanks, etc.). However, the construction maintenance
                shall be carried out by the Lessor</p>
              <p>The Lessee shall notify the Lessor of anything that requires the interference
                of the Lessor, such as urgent repairs required for the leased property;
                otherwise, the Lessee shall hold the liability to compensate any damage
                resulting from such negligence</p>
            </td>
            <td></td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Ten”</h3>
              <p>The Lessee shall pay all water, electricity, telephone charges, and any other
                charges that the Lessee is legally obliged to pay (including but not limited
                to direct or indirect taxes). Moreover, the Lessee shall submit upon the
                expiry of this Agreement clearance from respective authorities. </p>
              <p>The Lessor shall not be responsible for any type concerning the rented
                premises, such as fire, theft, etc.; the Lessee may insure the premises at his
                own expense without any liability on the Lessor</p>
              <p>The Lessee shall be responsible for the fire outbreak on the premises (as per
                the determination of the civil defense report of the fire cause).</p>
            </td>
            <td></td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Eleven”</h3>
              <p>The Second Party (The Lessee) acknowledges that the leased premises are
                in good order and repair and shall be deemed to have entirely and legally
                satisfied himself as to the condition thereof and that the property is
                completed and suitable for this purpose lease</p>
              <p>Where any act by the public authority causes considerable deficiency in
                the use of the property by the Lessee, The Lessee shall have no right to
                indemnity against the Lessor</p>
              <p>Moreover, the Lessee shall be responsible for obtaining the commercial
                license from the concerned authorities without any liability of the Lessor.</p>
            </td>
            <td></td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Twelve”</h3>
              <p>The Lessee shall not sublease or assign all or any part of its rights and
                obligations under this Lease without the Lessor's prior written consent.</p>
            </td>
            <td></td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Thirteen”</h3>
              <p>If the Lessee fails to perform any of its obligations under this Lease Contract,
                following ten days advance written notice from the Lessor, if such breach
                has not been completed, then the Contract shall be terminated, without the
                need of notice or court decision and the Lessee shall evacuate the premises
                and returned the premises to the Lessor, if the Lessee fails to return the
                rented premises after the expiration of ten days’ notice, the Lessee shall
                pay to the Lessor an amount of (QAR1,000) for each day of delay as a
                consensual compensation. Nevertheless, such compensation shall not be
                considered a renewal of the Contract, and the Lessor may enter the
                Premises and perform such obligations without liability to the Lessee for
                any loss or damage incurred as a result of such entry. In addition to the
                Lessor’s right to rent the premises without any objection from the Lessee</p>
            </td>
            <td>
              <h1 class="text-center">"البند الثالث عشر"</h1>
              <p>إذا فشل المستأجر في أداء أي من التزاماته بموجب عقد الإيجار هذا ،
                بعد عشرة أيام من الإخطار الكتابي المسبق من المؤجر ، إذا كان هذا الانتهاك
                لم يكتمل ، ثم يتم إنهاء العقد ، دون
                بحاجة إلى إشعار أو قرار من المحكمة ويجب على المستأجر إخلاء المبنى
                وإعادتها إلى المؤجر ، إذا فشل المستأجر في إعادة
                المباني المستأجرة بعد انتهاء مهلة عشرة أيام ، يجب على المستأجر
                دفع مبلغ (1،000 ريال قطري) للمؤجر عن كل يوم تأخير
                تعويض توافقي. ومع ذلك ، لا يجوز أن يكون هذا التعويض
                يعتبر تجديدًا للعقد ، ويجوز للمؤجر الدخول في
                مقر وأداء هذه الالتزامات دون مسؤولية تجاه المستأجر عن
                أي خسارة أو ضرر ناتج عن هذا الدخول. بالإضافة الى
                حق المؤجر في تأجير العقار دون أي اعتراض من المستأجر.</p>
            </td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Fourteen”</h3>
              <p>The Lessee hereby waives and disclaims his right to direct/ request
                the decisive oath related to any of the provisions stipulated on this
                Lease Agreement or any other facts thereto.</p>
            </td>
            <td></td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Fifteen”</h3>
              <p>I, ( NAME OF GURANTOR) holding a Qatari id No ………………….., hereby
                personally and solidarity and unconditionally guarantee to the Lessor to
                pay any and all amounts owing by the Lessor to the Lessee (NAME OF LESSEE )under the terms and conditions of this Lease Contract. This
                Guarantee shall apply on any renewal or extension of this Lease
                Agreement.</p>
            </td>
            <td></td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Sixteen”</h3>
              <p>This Lease shall be governed by and construed in accordance with Law No.
                (4) of 2008 Regarding Property Leasing</p>
            </td>
            <td></td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Seventeen”</h3>
              <p>The courts of the state of Qatar have exclusive jurisdiction to settle any
                disputes arising out of or in connection with this Contract</p>
            </td>
            <td></td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Eighteen”</h3>
              <p>This LEASE AGREEMENT shall be executed in two (2) original copies, the
                Arabic version shall prevail in case of conflict, and each party shall receive
                one (1) original copy, all of which shall be equal valid and enforceable.</p>
            </td>
            <td></td>
          </tr>
          <tr>
            <td>
              <p><b><u>First Party (The Lessor)</u></b></p><br>
              <p><b><u>Second Party (The Lessor)</u></b></p><br>
              <p><b><u>The Guarantor</u></b></p><br>
            </td>
            <td>
              <p><b><u>الطرف الأول "المؤجر"
                  </u></b></p><br>
              <p><b><u>الطرف الثاني "المستأجر"
                  </u></b></p><br>
              <p><b><u>الكفیل الضامن</u></b></p><br>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script>
    window.onload = function() {
        document.getElementById("download")
            .addEventListener("click", () => {
                const invoice = this.document.getElementById("contract-download");
                console.log(invoice);
                console.log(window);
                var opt = {
                    filename: 'AqaryClick-Contract.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'letter',
                        orientation: 'portrait'
                    }
                };
                html2pdf().from(invoice).set(opt).save();
            })
    }
</script>
  </body>

</html>