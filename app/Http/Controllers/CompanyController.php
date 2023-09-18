<?php

namespace App\Http\Controllers;

//burada request ve mail islemleri icin ilgili icerikleri ekledim
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

// companies ve user adli kullandigim 2 modeli burada tanittim
use App\Models\Companies;
use App\Models\User;

class CompanyController extends Controller
{
    // veritabanindan verileri datatable a verilerimizi cektik
    public function index()
    {
        $company = Companies::get(); // burada tum verilerimizi cekip 'company' isimli degiskene atadim
        return view('admin.company.company-list', ['company' => $company]); // admin/company/company-list view ini dondurup diger parametreyi ise view de degiskeni tanisin diye verdim
    }

    // veritabanindan Employee tablosusuna foreign key olan comp_id sini bu metot ile cekip select option ile kullandim
    public function getForeignKey()
    {
        $fk_id = Companies::all(); // yine view icin gerekli islemleri yaptim
        return view('admin.employee.employee-add', ['fk_id' => $fk_id]);
    }

    // ekleme islemini yapan arayuzu burada dondurdum
    public function add()
    {
        return view('admin.company.company-add');
    }

    // burada ekleme actioni olusturup request ile validation yaptim ve yukledigim logoyu almak icin gerekli yonlendirmeleri yaptim
    // ektra olarak yeni kayit olustugunda mail action ini hazirladim
    public function store(Request $request)
    {
        // validation
        $request->validate([
            'name' => 'required',
        ]);

        // burada upload islemi icin upload edilen dosyalari /storage/app/public klasorune eklettim 
        $requestData = $request->all();
        $fileName = time() . $request->file('logo')->getClientOriginalName();
        $path = $request->file('logo')->storeAs('images', $fileName, 'public');
        $requestData["logo"] = '/storage/' . $path;

        // mail action i islem icin ekledim Illuminate\Support\Facades\Mail;
        $company = Companies::create($requestData);
        Mail::send(
            'admin.data.mail-info',
            ['company' => $company],
            function ($message) {
                $message->to('oknaras@icloud.com', 'Okan Aras')->subject('Company Created Subject');
            }
        );

        // son olarak islem tamamlandiginda ve eger basarili ise donecek kisim ve mesaj bilgisi buradaki succes degiskenini view de almak icin verdim
        return redirect()->route('company-list')->with('success', 'Sirket bilgisi basariyla eklendi ve bilgi maili adresinize gonderildi!');

    }

    public function save(Request $request)
    {
    }

    // edit sayfasini goruntulemek icin kullandigim duzenlenecek id yi parametre alan metot
    public function edit($id)
    {
        // modelden veriyi sorguluyoruz
        $company = Companies::find($id);

        if ($company) {
            //eger kosul saglanirsa duzenle sayfasina yonlendiriyoruz
            return view('admin.company.company-edit', compact('company')); //compact ile view de verileri cekmek icin company degiskenini gonderiyoruz
        } else {
            return redirect()->route("company-list"); // eger id gelmezse liste sayfasina geri dondurulecek
        }
    }

    // update ve dogrulama isleminin yapildigi action
    public function update($id, Request $request)
    {
        // dogrulama islemi
        $request->validate([
            'name' => 'required',
        ]);

        //modelden gelen id yi bulup guncelledigimiz kisim
        Companies::findOrFail($id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'logo' => $request->logo,
            'web_site' => $request->web_site
        ]);

        // logo upload edip guncelleyen kisim 
        $requestData = $request->all();
        $fileName = time() . $request->file('logo')->getClientOriginalName();
        $path = $request->file('logo')->storeAs('images', $fileName, 'public');
        $requestData["logo"] = '/storage/' . $path;
        Companies::findOrFail($id)->update($requestData); // kaydetmesi icin bunu kullan!

        // eger basarili ise dondurulen kisim ve burada post islemi oldugu icin 'id' yi de gonderiyoruz
        return redirect()->route('company-list', $id)->with('success', 'Sirket bilgisi basariyla guncellendi!');
    }

    // silme isleminin gerceklestigi kisim
    public function delete($id)
    {
        // silinecek ogenin id sini cekiyorum
        $company = Companies::findOrFail($id);
        $company->delete(); // silme fonksiyounu uyguluyorum

        // islem tamamlandiginda ve eger basarili ise donecek kisim ve mesaj bilgisi buradaki succes degiskenini view de almak icin verdim
        return redirect()->route('company-list')->with('success', 'Sirket bilgisi basariyla silindi!');
    }

    // goruntuleme actionu 
    public function info($id)
    {
        // goruntulenecek ogenin id sini modelden cekip degiskene attim
        $company = Companies::findOrFail($id);

        if ($company) {
            //eger kosul saglanirsa info sayfasina yonlendirdim ve verilerini cekebilmek icin compact ile company degiskenini gonderdim
            return view('admin.company.company-info', compact('company'));
        } else {
            return redirect()->route("company-list"); // eger id gelmezse liste sayfasina geri dondurulecek
        }
    }

}