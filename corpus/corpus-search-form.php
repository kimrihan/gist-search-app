<!-- 검색 타입 선택 -->
<div class="corpus-form-radio">
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="corpusSearchForm" value="characteristic"
      id="corpus-search-characteristic">
    <label class="form-check-label" for="corpus-search-characteristic">
      특성 검색
    </label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="corpusSearchForm" value="word" id="corpus-search-word" checked>
    <label class="form-check-label" for="corpus-search-word">
      단어 검색
    </label>
  </div>
</div>
<!-- 특성검색 FORM -->
<form action="/korean-corpus-search-display" method="get" class="corpus-form characteristic">
  <div class="accordion" id="accordion-characteristic">
    <div class="accordion-item">
      <h2 class="accordion-header" id="panelsStayOpen-headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse"
          data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
          코퍼스
        </button>
      </h2>
      <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
        aria-labelledby="panelsStayOpen-headingOne">
        <div class="accordion-body corpus-type-radio">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="ct" id="corpus-literary" value="corpus_literary"
              checked />
            <label class="form-check-label" for="corpus-literary">
              문어 코퍼스
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="ct" id="corpus-colloquialness"
              value="corpus_colloquialness" />
            <label class="form-check-label" for="corpus-colloquialness">
              구어 코퍼스
            </label>
            <div class="invalid-feedback">코퍼스는 필수 항목입니다.</div>
          </div>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
          품사
        </button>
      </h2>
      <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
        aria-labelledby="panelsStayOpen-headingTwo">
        <div class="accordion-body checkbox-word-class">
          <div class="form-check">
            <input class="form-check-input corpus_literary" type="checkbox" name="wc[]" id="uninflected-word"
              value="체언" />
            <label class="form-check-label" for="uninflected-word">
              체언
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input corpus_literary" type="checkbox" name="wc[]" id="predicate" value="용언" />
            <label class="form-check-label" for="predicate">
              용언
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input corpus_literary" type="checkbox" name="wc[]" id="determiner" value="관형사" />
            <label class="form-check-label" for="determiner">
              관형사
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input corpus_literary" type="checkbox" name="wc[]" id="adverb" value="부사" />
            <label class="form-check-label" for="adverb">
              부사
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input corpus_literary" type="checkbox" name="wc[]" id="exclamation" value="감탄사" />
            <label class="form-check-label" for="exclamation">
              감탄사
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input corpus_literary" type="checkbox" name="wc[]" id="postposition" value="조사" />
            <label class="form-check-label" for="postposition">
              조사
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input corpus_literary" type="checkbox" name="wc[]" id="prefinal-ending"
              value="선어말어미" />
            <label class="form-check-label" for="prefinal-ending">
              선어말어미
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input corpus_literary" type="checkbox" name="wc[]" id="final-ending"
              value="어말어미" />
            <label class="form-check-label" for="final-ending">
              어말어미
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input corpus_literary" type="checkbox" name="wc[]" id="prefix" value="접두사" />
            <label class="form-check-label" for="prefix">
              접두사
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input corpus_literary" type="checkbox" name="wc[]" id="suffix" value="접미사" />
            <label class="form-check-label" for="suffix">
              접미사
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input corpus_literary" type="checkbox" name="wc[]" id="root" value="어근" />
            <label class="form-check-label" for="root">
              어근
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input corpus_literary" type="checkbox" name="wc[]" id="mark" value="부호" />
            <label class="form-check-label" for="mark">
              부호
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input corpus_literary" type="checkbox" name="wc[]" id="except-korean-lang"
              value="한글이외" />
            <label class="form-check-label" for="except-korean-lang">
              한글이외
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input corpus_colloquialness" type="checkbox" name="wc[]" id="spoken" value="어절"
              onclick="return false;" />
            <label class="form-check-label" for="spoken">
              어절
            </label>
          </div>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="panelsStayOpen-headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
          aria-controls="panelsStayOpen-collapseThree">
          빈도수
        </button>
      </h2>
      <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
        aria-labelledby="panelsStayOpen-headingThree">
        <div class="accordion-body frequency-value">
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="min-frequency" name="minF" placeholder="min" />
            <label for="min-frequency">최소 빈도</label>
          </div>
          <div class="form-floating">
            <input type="number" class="form-control" id="max-frequency" name="maxF" placeholder="max" />
            <label for="max-frequency">최대 빈도</label>
          </div>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="panelsStayOpen-headingFour">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
          aria-controls="panelsStayOpen-collapseFour">
          글자수
        </button>
      </h2>

      <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse"
        aria-labelledby="panelsStayOpen-headingFour">
        <div class="accordion-body character-number">
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="min-character" name="minC" placeholder="min" />
            <label for="min-character">최소 글자수</label>
          </div>
          <div class="form-floating">
            <input type="number" class="form-control" id="max-character" name="maxC" placeholder="max" />
            <label for="max-character">최대 글자수</label>
          </div>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="panelsStayOpen-headingFive">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false"
          aria-controls="panelsStayOpen-collapseFive">
          제외
        </button>
      </h2>
      <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse"
        aria-labelledby="panelsStayOpen-headingFive">
        <div class="accordion-body exclusion-value">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="exclusion-character" name="exC" placeholder="제외 단어"
              autocomplete="off" />
            <label for="exclusion-character">제외 단어</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="exclusion-min-frequency" name="exMinF" placeholder="min" />
            <label for="exclusion-min-frequency">최소 빈도</label>
          </div>
          <div class="form-floating">
            <input type="number" class="form-control" id="exclusion-max-frequency" name="exMaxF" placeholder="max" />
            <label for="exclusion-max-frequency">최대 빈도</label>
          </div>
        </div>
      </div>
    </div>
  </div>
  <button class="btn btn-primary" type="submit" name="submitc">
    검색하기
  </button>
</form>
<!-- 단어검색 FORM -->
<form action="/korean-corpus-search-display" method="get" class="corpus-form word">
  <div class="accordion" id="accordion-word">
    <div class="accordion-item">
      <h2 class="accordion-header" id="panelsStayOpen-headingSix">
        <button class="accordion-button" type="button" data-bs-toggle="collapse"
          data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="true" aria-controls="panelsStayOpen-collapseSix">
          코퍼스
        </button>
      </h2>
      <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse show"
        aria-labelledby="panelsStayOpen-headingSix">
        <div class="accordion-body corpus-type-radio">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="ct" id="corpus-literary-word" value="corpus_literary"
              checked />
            <label class="form-check-label" for="corpus-literary-word">
              문어 코퍼스
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="ct" id="corpus-colloquialness-word"
              value="corpus_colloquialness" />
            <label class="form-check-label" for="corpus-colloquialness-word">
              구어 코퍼스
            </label>
            <div class="invalid-feedback">코퍼스는 필수 항목입니다.</div>
          </div>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
          aria-expanded="true" aria-controls="collapseOne">
          위치
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
        data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <div class="checkbox-same-position">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="sp[]" id="same-totally" value="totally">
              <label class="form-check-label" for="same-totally">완전일치</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="sp[]" id="same-front" value="front">
              <label class="form-check-label" for="same-front">첫음절 일치</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="sp[]" id="same-last" value="rear">
              <label class="form-check-label" for="same-last">끝음절 일치</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="sp[]" id="same-portion" value="portion">
              <label class="form-check-label" for="same-portion">부분 일치</label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="input-group mb-3">
    <input type="text" class="form-control" name="word" placeholder="검색어를 입력해 주세요." autocomplete="off" required>
    <button class="btn btn-outline-secondary" type="submit" name="submitw">검색하기</button>
  </div>
  <div class="accordion" id="accordion-word">
  </div>
</form>