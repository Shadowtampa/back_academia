
     
        <h1>TREINO FORM</h1>


        <form  method="POST" action="{{ route('treino.store') }}" >
          @csrf
          <label for="title">Nome do treino:</label>
          <input type="text" id="nome" name="title" required>
      
          <label for="dayOfTheWeek">Dia da Semana:</label>
          <select name="dayOfTheWeek">
            <option value="segunda">Segunda</option>
            <option value="terca">Terça</option>
            <option value="quarta">Quarta</option>
            <option value="quinta">Quinta</option>
            <option value="sexta">Sexta</option>
            <option value="sabado">Sábado</option>
            <option value="domingo">Domingo</option>
          </select>
          
          <button type="submit">Criar treino</button>
        </form>

