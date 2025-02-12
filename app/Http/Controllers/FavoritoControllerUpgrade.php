
namespace App\Http\Controllers;

use App\Models\Favorito;
use App\Models\Producto;
use App\Models\Cliente;
use Illuminate\Http\Request;

class FavoritoController extends Controller
{
    // Obtener el cliente asociado al usuario actual
    private function getCliente()
    {
        return Cliente::where('usuario_id', auth()->id())->first();
    }

    // Mostrar los productos favoritos
    public function index()
    {
        $cliente = $this->getCliente();

        if (!$cliente) {
            return redirect()->route('perfil')->with('error', 'Debe completar su perfil antes de acceder a los favoritos.');
        }

        // Obtener los productos en los favoritos del cliente
        $favoritos = $cliente->favoritos()->with('productos')->get();

        return view('dashboard-complements.favoritos', compact('favoritos'));
    }

    // Agregar producto a favoritos
    public function agregar(Request $request, $producto_id)
    {
        $producto = Producto::findOrFail($producto_id);

        $cliente = $this->getCliente();
        if (!$cliente) {
            return redirect()->route('perfil')->with('error', 'Debe completar su perfil antes de agregar productos a favoritos.');
        }

        $favorito = Favorito::firstOrCreate(['usuario_id' => $cliente->usuario_id]);

        // Verificar si el producto ya está en los favoritos
        if (!$favorito->productos->contains($producto)) {
            $favorito->productos()->attach($producto_id);
        }

        return redirect()->route('favoritos.index');
    }

    // Eliminar producto de favoritos
    public function eliminar($producto_id)
    {
        $cliente = $this->getCliente();
        $favorito = $cliente->favoritos()->first();

        if ($favorito) {
            $favorito->productos()->detach($producto_id);
        }

        return redirect()->route('favoritos.index');
    }
}
